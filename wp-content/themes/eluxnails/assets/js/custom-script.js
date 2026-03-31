/**
 * Fortuna Beauty - Custom JavaScript
 * Optimized for performance and clean structure
 */

document.addEventListener("DOMContentLoaded", function () {
  // 1. Initialize AOS (Scroll animation)
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: 800,
      easing: "ease-in-out",
      once: true,
      offset: 80,
    });
  }

  // 2. Navbar scroll effect
  const navbar = document.getElementById("mainNavbar");
  if (navbar) {
    window.addEventListener("scroll", function () {
      // Using classList.toggle for cleaner code
      navbar.classList.toggle("scrolled", window.scrollY > 50);
    });
  }

  // 3. Scroll to Top button
  const scrollBtn = document.getElementById("scrollToTop");
  if (scrollBtn) {
    window.addEventListener("scroll", function () {
      scrollBtn.classList.toggle("visible", window.scrollY > 300);
    });

    scrollBtn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  // 4. Auto-detect current page (Active Nav Link)
  const currentPath = window.location.pathname.replace(/\/$/, "") || "/";
  document.querySelectorAll(".elux-navbar .nav-link").forEach(function (link) {
    const href = link.getAttribute("href");
    if (href) {
      try {
        const linkPath =
          new URL(href, window.location.origin).pathname.replace(/\/$/, "") ||
          "/";
        if (linkPath === currentPath) {
          link.classList.add("active");
        }
      } catch (e) {
        // Skip invalid href
      }
    }
  });

  // 5. Close navbar on outside click (Mobile/Tablet)
  const navbarNav = document.getElementById("navbarNav");
  const toggler = document.querySelector(".navbar-toggler");
  if (navbarNav && toggler) {
    document.addEventListener("click", function (e) {
      const isOpen = navbarNav.classList.contains("show");
      const clickedInside = navbarNav.contains(e.target);
      const clickedToggler = toggler.contains(e.target);
      if (isOpen && !clickedInside && !clickedToggler) {
        toggler.click();
      }
    });
  }

  // 6. Initialize Gallery Swiper (only if element exists on page)
  const galleryEl = document.querySelector(".gallery-swiper");
  if (galleryEl && typeof Swiper !== "undefined") {
    new Swiper(".gallery-swiper", {
      slidesPerView: 1.3,
      spaceBetween: 12,
      centeredSlides: true,
      loop: true,
      speed: 800,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      breakpoints: {
        576: { slidesPerView: 2.2, spaceBetween: 14, centeredSlides: false },
        768: { slidesPerView: 3, spaceBetween: 16, centeredSlides: false },
        992: { slidesPerView: 4, spaceBetween: 16, centeredSlides: false },
        1200: { slidesPerView: 4.5, spaceBetween: 16, centeredSlides: false },
      },
    });
  }

  // 7. Floating hearts - rise from bottom randomly
  function createHeart() {
    const heart = document.createElement("div");
    heart.innerHTML = "❤";
    heart.className = "heart-up";

    heart.style.left = Math.random() * 100 + "vw";

    const size = Math.random() * 15 + 10 + "px";
    heart.style.fontSize = size;

    const duration = Math.random() * 3 + 5;
    heart.style.animationDuration = duration + "s";

    heart.style.opacity = Math.random() * 0.5 + 0.3;

    document.body.appendChild(heart);

    setTimeout(() => {
      heart.remove();
    }, duration * 1000);
  }

  setInterval(createHeart, 400);

  // 8. Cursor trail - hearts follow mouse movement
  const trailColors = ["#e8a2ad", "#d68c96", "#ff6b9d", "#ffb3c6", "#ff85a1"];

  let LastMoveTime = 0;
  document.addEventListener("mousemove", function (e) {
    if (Date.now() - LastMoveTime < 50) return; // Throttle to every 50ms
    LastMoveTime = Date.now();
    const heart = document.createElement("div");
    heart.innerHTML = "♥";
    heart.style.cssText = `
            position: fixed;
            pointer-events: none;
            z-index: 99999;
            font-size: ${Math.random() * 12 + 8}px;
            color: ${trailColors[Math.floor(Math.random() * trailColors.length)]};
            left: ${e.clientX - 6}px;
            top: ${e.clientY - 6}px;
            opacity: 1;
            transition: transform 0.7s ease-out, opacity 0.7s ease-out;
            user-select: none;
            line-height: 1;
        `;
    document.body.appendChild(heart);

    const dx = (Math.random() - 0.5) * 50;
    const dy = -(Math.random() * 50 + 20);

    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        heart.style.transform = `translate(${dx}px, ${dy}px) scale(0.2)`;
        heart.style.opacity = "0";
      });
    });

    setTimeout(function () {
      heart.remove();
    }, 700);
  });

  /* ==========================================================================
   FEATURE ENHANCEMENTS - loaded after DOMContentLoaded
   ========================================================================== */

  // ── Parallax Hero (pure JS, no extra lib needed) ──────────────────────────
  (function () {
    const heroImg =
      document.querySelector(".hero-image.parallax-img img") ||
      document.querySelector(".hero-image img");
    if (!heroImg) return;
    // Mark parent for CSS targeting
    heroImg.closest(".hero-image").classList.add("parallax-img");

    window.addEventListener(
      "scroll",
      function () {
        const scrollY = window.scrollY;
        const heroSection = document.querySelector(".hero-section");
        if (!heroSection) return;
        const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
        if (scrollY < heroBottom) {
          heroImg.style.transform =
            "translateY(" + scrollY * 0.18 + "px) scale(1.08)";
        }
      },
      { passive: true },
    );
  })();

  // ── 3D Nail Polish – Three.js canvas ─────────────────────────────────────
  (function () {
    const canvas = document.getElementById("nail3d-canvas");
    if (!canvas) return;

    // Dynamically load Three.js r128
    const script = document.createElement("script");
    script.src =
      "https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js";
    script.onload = function () {
      initNail3D(canvas);
    };
    document.head.appendChild(script);

    function initNail3D(canvas) {
      const W = canvas.width,
        H = canvas.height;
      const renderer = new THREE.WebGLRenderer({
        canvas,
        antialias: false,
        alpha: true,
        powerPreference: "high-performance",
      });
      renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
      renderer.setSize(W, H);
      renderer.shadowMap.enabled = true;
      renderer.shadowMap.type = THREE.PCFSoftShadowMap;

      const scene = new THREE.Scene();
      const camera = new THREE.PerspectiveCamera(45, W / H, 0.1, 100);
      camera.position.set(0, 1.5, 7);
      camera.lookAt(0, 0, 0);

      // Lighting
      const ambient = new THREE.AmbientLight(0xfff0f5, 0.6);
      scene.add(ambient);

      const keyLight = new THREE.DirectionalLight(0xffffff, 1.2);
      keyLight.position.set(3, 6, 4);
      keyLight.castShadow = true;
      scene.add(keyLight);

      const fillLight = new THREE.PointLight(0xffb3c6, 0.8, 20);
      fillLight.position.set(-4, 2, 2);
      scene.add(fillLight);

      const rimLight = new THREE.PointLight(0xe8a2ad, 0.5, 15);
      rimLight.position.set(0, -3, -4);
      scene.add(rimLight);

      // ── Build bottle group ──
      const group = new THREE.Group();
      scene.add(group);

      let bottleColor = new THREE.Color("#d68c96");

      // Bottle body – CylinderGeometry (tapered)
      const bodyGeo = new THREE.CylinderGeometry(0.72, 0.82, 3.2, 32, 1, false);
      
      const bodyMat = new THREE.MeshPhysicalMaterial({
        color: bottleColor,
        metalness: 0.05,
        roughness: 0.08,
        transmission: 0.55,
        thickness: 1.2,
        transparent: true,
        opacity: 0.88,
        envMapIntensity: 1.2,
      });
      const body = new THREE.Mesh(bodyGeo, bodyMat);
      body.position.y = 0;
      body.castShadow = true;
      group.add(body);

      // Shoulder (taper between body and neck)
      const shoulderGeo = new THREE.CylinderGeometry(0.38, 0.72, 0.7, 64);
      const shoulder = new THREE.Mesh(shoulderGeo, bodyMat);
      shoulder.position.y = 1.95;
      group.add(shoulder);

      // Neck
      const neckGeo = new THREE.CylinderGeometry(0.3, 0.38, 0.6, 64);
      const neckMat = new THREE.MeshPhysicalMaterial({
        color: 0xf0f0f0,
        metalness: 0.2,
        roughness: 0.1,
      });
      const neck = new THREE.Mesh(neckGeo, neckMat);
      neck.position.y = 2.6;
      group.add(neck);

      // Cap (flat cylinder + rounded top)
      const capGeo = new THREE.CylinderGeometry(0.34, 0.34, 1.1, 64);
      const capMat = new THREE.MeshPhysicalMaterial({
        color: 0x2a1a1e,
        metalness: 0.6,
        roughness: 0.15,
      });
      const cap = new THREE.Mesh(capGeo, capMat);
      cap.position.y = 3.5;
      group.add(cap);

      // Cap top dome
      const domeGeo = new THREE.SphereGeometry(
        0.34,
        64,
        32,
        0,
        Math.PI * 2,
        0,
        Math.PI / 2,
      );
      const dome = new THREE.Mesh(domeGeo, capMat);
      dome.position.y = 4.05;
      group.add(dome);

      // Bottom base disc
      const baseGeo = new THREE.CylinderGeometry(0.82, 0.82, 0.12, 64);
      const baseMat = new THREE.MeshPhysicalMaterial({
        color: 0x1a0f13,
        metalness: 0.3,
        roughness: 0.2,
      });
      const base = new THREE.Mesh(baseGeo, baseMat);
      base.position.y = -1.66;
      group.add(base);

      // Label stripe
      const labelGeo = new THREE.CylinderGeometry(0.74, 0.74, 1.2, 64, 1, true);
      const labelMat = new THREE.MeshStandardMaterial({
        color: 0xffffff,
        transparent: true,
        opacity: 0.18,
        side: THREE.FrontSide,
      });
      const label = new THREE.Mesh(labelGeo, labelMat);
      label.position.y = -0.2;
      group.add(label);

      // Brush stick inside bottle (dark thin rod)
      const brushGeo = new THREE.CylinderGeometry(0.04, 0.04, 4.8, 12);
      const brushMat = new THREE.MeshStandardMaterial({ color: 0x1a1a1a });
      const brush = new THREE.Mesh(brushGeo, brushMat);
      brush.position.y = 0.6;
      group.add(brush);

      group.position.y = -0.5;

      // ── Drag rotation ──
      let isDragging = false;
      let prevX = 0,
        prevY = 0;
      let rotX = 0,
        rotY = 0;
      let velX = 0,
        velY = 0;

      canvas.addEventListener("mousedown", function (e) {
        isDragging = true;
        prevX = e.clientX;
        prevY = e.clientY;
        velX = 0;
        velY = 0;
      });
      window.addEventListener("mouseup", function () {
        isDragging = false;
      });
      window.addEventListener("mousemove", function (e) {
        if (!isDragging) return;
        const dx = e.clientX - prevX;
        const dy = e.clientY - prevY;
        velX = dx * 0.012;
        velY = dy * 0.008;
        rotY += velX;
        rotX += velY;
        rotX = Math.max(-0.7, Math.min(0.7, rotX));
        prevX = e.clientX;
        prevY = e.clientY;
      });

      // Touch support
      canvas.addEventListener(
        "touchstart",
        function (e) {
          isDragging = true;
          prevX = e.touches[0].clientX;
          prevY = e.touches[0].clientY;
        },
        { passive: true },
      );
      canvas.addEventListener("touchend", function () {
        isDragging = false;
      });
      canvas.addEventListener(
        "touchmove",
        function (e) {
          if (!isDragging) return;
          const dx = e.touches[0].clientX - prevX;
          const dy = e.touches[0].clientY - prevY;
          velX = dx * 0.012;
          velY = dy * 0.008;
          rotY += velX;
          rotX += velY;
          rotX = Math.max(-0.7, Math.min(0.7, rotX));
          prevX = e.touches[0].clientX;
          prevY = e.touches[0].clientY;
        },
        { passive: true },
      );

      // ── Color picker ──
      document.querySelectorAll(".nail3d-color-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {
          document
            .querySelectorAll(".nail3d-color-btn")
            .forEach((b) => b.classList.remove("active"));
          btn.classList.add("active");
          const hex = btn.getAttribute("data-color");
          bottleColor = new THREE.Color(hex);
          bodyMat.color.set(bottleColor);
          // Adjust opacity for white
          bodyMat.opacity = hex === "#ffffff" ? 0.75 : 0.88;
        });
      });

      // ── Animate ──
      let autoRotY = 0;
      function animate() {
        requestAnimationFrame(animate);
        if (!isDragging) {
          // Inertia
          velX *= 0.92;
          velY *= 0.92;
          rotY += velX;
          rotX += velY;
          // Gentle auto-spin
          autoRotY += 0.004;
        }
        group.rotation.y = rotY + autoRotY;
        group.rotation.x = rotX;

        // Subtle float
        group.position.y = -0.5 + Math.sin(Date.now() * 0.001) * 0.08;

        renderer.render(scene, camera);
      }
      animate();
    }
  })();
});
