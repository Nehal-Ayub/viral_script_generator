(() => {
  const defaultScripts = [
    {
      title: "Script #1: Productivity",
      hook: "If you have 10 minutes, you can reset your entire day.",
      body: "Here are 3 micro-habits I use before noon...",
      cta: "Comment 'RESET' and I'll send my routine.",
    },
    {
      title: "Script #2: Fitness",
      hook: "Most people fail fat loss in week 2 for this reason.",
      body: "Stop doing all-or-nothing workouts. Do this instead...",
      cta: "Follow for daily 30-second fitness tips.",
    },
    {
      title: "Script #3: Business",
      hook: "This one content framework doubled my DMs.",
      body: "Use Problem -> Proof -> Pitch in every short video...",
      cta: "Save this and send it to a creator friend.",
    },
  ];

  const generatorForm = document.getElementById("generator-form");
  const topicInput = document.getElementById("topic-input");
  const scriptsList = document.getElementById("scripts-list");
  const generatorFeedback = document.getElementById("generator-feedback");
  const emailForm = document.getElementById("email-form");
  const emailInput = document.getElementById("email-input");
  const emailFeedback = document.getElementById("email-feedback");

  let activeScripts = [...defaultScripts];

  function scriptToText(script) {
    return `Hook: "${script.hook}"\nBody: "${script.body}"\nCTA: "${script.cta}"`;
  }

  function renderScripts(scripts) {
    scriptsList.innerHTML = "";
    scripts.forEach((script, index) => {
      const card = document.createElement("article");
      card.className = "card script-card reveal visible";

      const title = document.createElement("h3");
      title.textContent = script.title || `Script #${index + 1}`;

      const text = document.createElement("p");
      text.className = "script-text";
      text.textContent = scriptToText(script);

      const copyButton = document.createElement("button");
      copyButton.className = "btn btn-copy";
      copyButton.type = "button";
      copyButton.textContent = "Copy Script";
      copyButton.addEventListener("click", async () => {
        try {
          await navigator.clipboard.writeText(text.textContent || "");
          copyButton.textContent = "Copied!";
          setTimeout(() => {
            copyButton.textContent = "Copy Script";
          }, 1400);
        } catch (error) {
          copyButton.textContent = "Copy failed";
          setTimeout(() => {
            copyButton.textContent = "Copy Script";
          }, 1400);
        }
      });

      card.append(title, text, copyButton);
      scriptsList.appendChild(card);
    });
  }

  if (generatorForm) {
    generatorForm.addEventListener("submit", async (event) => {
      event.preventDefault();
      const topic = topicInput.value.trim();
      if (!topic) {
        topicInput.focus();
        return;
      }

      const submitButton = generatorForm.querySelector("button[type='submit']");
      if (submitButton) {
        submitButton.disabled = true;
        submitButton.textContent = "Generating...";
      }

      if (generatorFeedback) {
        generatorFeedback.className = "feedback";
        generatorFeedback.textContent = "";
      }

      try {
        const response = await fetch("api/generate.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ topic }),
        });
        const payload = await response.json();
        if (!response.ok || !payload.success) {
          throw new Error(payload.message || "Failed to generate scripts.");
        }

        activeScripts = payload.scripts || [];
        renderScripts(activeScripts);
        if (generatorFeedback) {
          generatorFeedback.className = "feedback success";
          generatorFeedback.textContent = `Generated scripts for "${payload.topic}".`;
        }
      } catch (error) {
        if (generatorFeedback) {
          generatorFeedback.className = "feedback error";
          generatorFeedback.textContent = error.message || "Could not generate scripts.";
        }
      } finally {
        if (submitButton) {
          submitButton.disabled = false;
          submitButton.textContent = "Generate Script";
        }
      }
    });
  }

  if (emailForm) {
    emailForm.addEventListener("submit", async (event) => {
      event.preventDefault();
      const email = emailInput.value.trim();
      if (!email) {
        return;
      }

      const submitButton = emailForm.querySelector("button[type='submit']");
      if (submitButton) {
        submitButton.disabled = true;
        submitButton.textContent = "Joining...";
      }

      emailFeedback.className = "feedback";
      emailFeedback.textContent = "";

      try {
        const response = await fetch("api/subscribe.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ email }),
        });
        const payload = await response.json();
        if (!response.ok || !payload.success) {
          throw new Error(payload.message || "Could not save your email.");
        }

        emailFeedback.className = "feedback success";
        emailFeedback.textContent = payload.message || "You have joined the waitlist.";
        emailForm.reset();
      } catch (error) {
        emailFeedback.className = "feedback error";
        emailFeedback.textContent = error.message || "Unable to join waitlist right now.";
      } finally {
        if (submitButton) {
          submitButton.disabled = false;
          submitButton.textContent = "Join Waitlist";
        }
      }
    });
  }

  const revealItems = document.querySelectorAll(".reveal");
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    },
    { threshold: 0.15 }
  );
  revealItems.forEach((element) => observer.observe(element));
})();
