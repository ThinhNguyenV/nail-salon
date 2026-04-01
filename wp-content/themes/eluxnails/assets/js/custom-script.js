/**
 * Fortuna Beauty - Custom JavaScript
 * Optimized for performance — mobile-first
 */

document.addEventListener("DOMContentLoaded", function () {

  const isMobile = /Android|iPhone|iPad|iPod|Mobile/i.test(navigator.userAgent)
    || window.innerWidth < 768;

  // 1. Initialize AOS
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: isMobile ? 600 : 800,
      easing: "ease-in-out",
      once: true,
      offset: 60,
      disable: false,
    });
  }

  // 2. Navbar scroll effect — throttled
  const navbar = document.getElementById("mainNavbar");
  if (navbar) {
    let scrollTicking = false;
    window.addEventListener("scroll", function () {
      if (!scrollTicking) {
        requestAnimationFrame(function () {
          navbar.classList.toggle("scrolled", window.scrollY > 50);
          scrollTicking = false;
        });
        scrollTicking = true;
      }
    }, { passive: true });
  }

  // 3. Scroll to Top button — throttled
  const scrollBtn = document.getElementById("scrollToTop");
  if (scrollBtn) {
    let btnTicking = false;
    window.addEventListener("scroll", function () {
      if (!btnTicking) {
        requestAnimationFrame(function () {
          scrollBtn.classList.toggle("visible", window.scrollY > 300);
          btnTicking = false;
        });
        btnTicking = true;
      }
    }, { passive: true });

    scrollBtn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  // 4. Auto-detect active nav link
  const currentPath = window.location.pathname.replace(/\/$/, "") || "/";
  document.querySelectorAll(".elux-navbar .nav-link").forEach(function (link) {
    const href = link.getAttribute("href");
    if (href) {
      try {
        const linkPath = new URL(href, window.location.origin).pathname.replace(/\/$/, "") || "/";
        if (linkPath === currentPath) link.classList.add("active");
      } catch (e) {}
    }
  });

  // 5. Close navbar on outside click (Mobile/Tablet)
  const navbarNav = document.getElementById("navbarNav");
  const toggler = document.querySelector(".navbar-toggler");
  if (navbarNav && toggler) {
    document.addEventListener("click", function (e) {
      if (
        navbarNav.classList.contains("show") &&
        !navbarNav.contains(e.target) &&
        !toggler.contains(e.target)
      ) {
        toggler.click();
      }
    });
  }

  // 6. Gallery Swiper
  const galleryEl = document.querySelector(".gallery-swiper");
  if (galleryEl && typeof Swiper !== "undefined") {
    new Swiper(".gallery-swiper", {
      slidesPerView: 1.3,
      spaceBetween: 12,
      centeredSlides: true,
      loop: true,
      speed: isMobile ? 500 : 800,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      breakpoints: {
        576: { slidesPerView: 2.2, spaceBetween: 14, centeredSlides: false },
        768: { slidesPerView: 3,   spaceBetween: 16, centeredSlides: false },
        992: { slidesPerView: 4,   spaceBetween: 16, centeredSlides: false },
        1200:{ slidesPerView: 4.5, spaceBetween: 16, centeredSlides: false },
      },
    });
  }

  // 7. Floating hearts — chỉ chạy trên homepage
  // Check bằng data-page="home" trên thẻ <main> (được set trong front-page.php)
  const isHomePage = document.querySelector('main[data-page="home"]') !== null;

  (function () {
    if (!isHomePage) return; 

    const interval = isMobile ? 1200 : 400; // mobile: 1 heart/1.2s thay vì 400ms
    const maxHearts = isMobile ? 6 : 20;    // giới hạn số tim đồng thời
    let heartCount = 0;

    function createHeart() {
      if (heartCount >= maxHearts) return;
      heartCount++;

      const heart = document.createElement("div");
      heart.textContent = "❤";
      heart.className = "heart-up";
      heart.style.left = Math.random() * 100 + "vw";

      const size = Math.random() * 15 + 10;
      heart.style.fontSize = size + "px";

      const duration = Math.random() * 3 + 5;
      heart.style.animationDuration = duration + "s";
      heart.style.opacity = Math.random() * 0.5 + 0.3;

      document.body.appendChild(heart);

      setTimeout(function () {
        heart.remove();
        heartCount--;
      }, duration * 1000);
    }

    setInterval(createHeart, interval);
  })();

  // 8. Cursor trail — chỉ chạy trên desktop (all pages)
  if (!isMobile && window.matchMedia("(hover: hover)").matches) {
    const trailColors = ["#e8a2ad", "#d68c96", "#ff6b9d", "#ffb3c6", "#ff85a1"];
    let lastMoveTime = 0;

    document.addEventListener("mousemove", function (e) {
      const now = Date.now();
      if (now - lastMoveTime < 60) return; // throttle 60ms
      lastMoveTime = now;

      const heart = document.createElement("div");
      heart.textContent = "♥";
      heart.style.cssText = [
        "position:fixed",
        "pointer-events:none",
        "z-index:99999",
        "font-size:" + (Math.random() * 12 + 8) + "px",
        "color:" + trailColors[Math.floor(Math.random() * trailColors.length)],
        "left:" + (e.clientX - 6) + "px",
        "top:" + (e.clientY - 6) + "px",
        "opacity:1",
        "transition:transform 0.7s ease-out,opacity 0.7s ease-out",
        "user-select:none",
        "will-change:transform,opacity",
        "line-height:1",
      ].join(";");

      document.body.appendChild(heart);

      const dx = (Math.random() - 0.5) * 50;
      const dy = -(Math.random() * 50 + 20);

      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          heart.style.transform = "translate(" + dx + "px," + dy + "px) scale(0.2)";
          heart.style.opacity = "0";
        });
      });

      setTimeout(function () { heart.remove(); }, 700);
    });
  }

  /* =========================================================================
     FEATURE ENHANCEMENTS
     ========================================================================= */

  // ── Parallax Hero — tắt trên mobile (tốn pin, không cần thiết) ──────────
  if (!isMobile) {
    (function () {
      const heroImg =
        document.querySelector(".hero-image.parallax-img img") ||
        document.querySelector(".hero-image img");
      if (!heroImg) return;

      heroImg.closest(".hero-image").classList.add("parallax-img");
      const heroSection = document.querySelector(".hero-section");
      if (!heroSection) return;

      let parallaxTicking = false;
      window.addEventListener("scroll", function () {
        if (parallaxTicking) return;
        parallaxTicking = true;
        requestAnimationFrame(function () {
          const scrollY = window.scrollY;
          const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
          if (scrollY < heroBottom) {
            heroImg.style.transform = "translateY(" + (scrollY * 0.18) + "px) scale(1.08)";
          }
          parallaxTicking = false;
        });
      }, { passive: true });
    })();
  }

  // ── 3D Nail Polish – Three.js ────────────────────────────────────────────
  (function () {
    const canvas = document.getElementById("nail3d-canvas");
    if (!canvas) return;

    const script = document.createElement("script");
    script.src = "https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js";
    script.onload = function () { initNail3D(canvas); };
    document.head.appendChild(script);

    function initNail3D(canvas) {
      // Segments thấp hơn trên mobile để giảm tải GPU
      const SEG = isMobile ? 24 : 48;
      const SEG_LO = isMobile ? 8 : 12;

      function getCanvasSize() {
        const vw = window.innerWidth;
        if (vw < 576)  { const w = Math.round(vw * 0.85); return { w, h: w }; }
        if (vw < 992)  { const w = Math.round(vw * 0.55); return { w, h: w }; }
        return { w: 480, h: 480 };
      }

      function applySize() {
        const { w, h } = getCanvasSize();
        canvas.width  = w;
        canvas.height = h;
        canvas.style.width  = w + "px";
        canvas.style.height = h + "px";
        return { w, h };
      }

      let { w: W, h: H } = applySize();

      const renderer = new THREE.WebGLRenderer({
        canvas,
        antialias: !isMobile,   // tắt antialias trên mobile
        alpha: true,
        powerPreference: isMobile ? "low-power" : "high-performance",
      });
      renderer.setPixelRatio(isMobile ? 1 : Math.min(window.devicePixelRatio, 1.5));
      renderer.setSize(W, H);
      // Tắt shadow trên mobile — tiết kiệm GPU đáng kể
      renderer.shadowMap.enabled = !isMobile;
      if (!isMobile) renderer.shadowMap.type = THREE.PCFSoftShadowMap;

      const scene = new THREE.Scene();
      const camera = new THREE.PerspectiveCamera(45, W / H, 0.1, 100);
      camera.position.set(0, 1.5, 7);
      camera.lookAt(0, 0, 0);

      // Resize handler — debounced
      let resizeTimer;
      window.addEventListener("resize", function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function () {
          const { w, h } = applySize();
          renderer.setSize(w, h);
          camera.aspect = w / h;
          camera.updateProjectionMatrix();
        }, 200);
      });

      // Lighting
      scene.add(new THREE.AmbientLight(0xfff0f5, isMobile ? 0.9 : 0.6));

      const keyLight = new THREE.DirectionalLight(0xffffff, 1.2);
      keyLight.position.set(3, 6, 4);
      keyLight.castShadow = !isMobile;
      scene.add(keyLight);

      // Chỉ thêm fill/rim light trên desktop
      if (!isMobile) {
        const fillLight = new THREE.PointLight(0xffb3c6, 0.8, 20);
        fillLight.position.set(-4, 2, 2);
        scene.add(fillLight);

        const rimLight = new THREE.PointLight(0xe8a2ad, 0.5, 15);
        rimLight.position.set(0, -3, -4);
        scene.add(rimLight);
      }

      // ── Bottle group ──
      const group = new THREE.Group();
      scene.add(group);

      let bottleColor = new THREE.Color("#d68c96");

      // Mobile dùng MeshStandardMaterial (nhẹ hơn MeshPhysicalMaterial rất nhiều)
      const bodyMat = isMobile
        ? new THREE.MeshStandardMaterial({
            color: bottleColor,
            metalness: 0.1,
            roughness: 0.2,
            transparent: true,
            opacity: 0.88,
          })
        : new THREE.MeshPhysicalMaterial({
            color: bottleColor,
            metalness: 0.05,
            roughness: 0.08,
            transmission: 0.55,
            thickness: 1.2,
            transparent: true,
            opacity: 0.88,
            envMapIntensity: 1.2,
          });

      const neckMat = new THREE.MeshStandardMaterial({ color: 0xf0f0f0, metalness: 0.2, roughness: 0.1 });
      const capMat  = new THREE.MeshStandardMaterial({ color: 0x2a1a1e, metalness: 0.6, roughness: 0.15 });
      const baseMat = new THREE.MeshStandardMaterial({ color: 0x1a0f13, metalness: 0.3, roughness: 0.2 });

      const addMesh = (geo, mat, y, castShadow) => {
        const m = new THREE.Mesh(geo, mat);
        m.position.y = y;
        if (castShadow && !isMobile) m.castShadow = true;
        group.add(m);
        return m;
      };

      addMesh(new THREE.CylinderGeometry(0.72, 0.82, 3.2, SEG, 1, false), bodyMat,  0,    true);
      addMesh(new THREE.CylinderGeometry(0.38, 0.72, 0.7, SEG),           bodyMat,  1.95, false);
      addMesh(new THREE.CylinderGeometry(0.3,  0.38, 0.6, SEG),           neckMat,  2.6,  false);
      addMesh(new THREE.CylinderGeometry(0.34, 0.34, 1.1, SEG),           capMat,   3.5,  false);
      addMesh(new THREE.SphereGeometry(0.34, SEG, SEG / 2, 0, Math.PI * 2, 0, Math.PI / 2), capMat, 4.05, false);
      addMesh(new THREE.CylinderGeometry(0.82, 0.82, 0.12, SEG),          baseMat, -1.66, false);

      // Label stripe — skip on mobile
      if (!isMobile) {
        const labelMat = new THREE.MeshStandardMaterial({ color: 0xffffff, transparent: true, opacity: 0.18, side: THREE.FrontSide });
        addMesh(new THREE.CylinderGeometry(0.74, 0.74, 1.2, SEG, 1, true), labelMat, -0.2, false);
      }

      // Brush stick
      addMesh(new THREE.CylinderGeometry(0.04, 0.04, 4.8, SEG_LO), new THREE.MeshStandardMaterial({ color: 0x1a1a1a }), 0.6, false);

      group.position.y = -0.5;

      // ── Drag rotation ──
      let isDragging = false, prevX = 0, prevY = 0, rotX = 0, rotY = 0, velX = 0, velY = 0;

      canvas.addEventListener("mousedown", function (e) {
        isDragging = true; prevX = e.clientX; prevY = e.clientY; velX = 0; velY = 0;
      });
      window.addEventListener("mouseup",   function () { isDragging = false; });
      window.addEventListener("mousemove", function (e) {
        if (!isDragging) return;
        velX = (e.clientX - prevX) * 0.012;
        velY = (e.clientY - prevY) * 0.008;
        rotY += velX; rotX += velY;
        rotX = Math.max(-0.7, Math.min(0.7, rotX));
        prevX = e.clientX; prevY = e.clientY;
      });

      canvas.addEventListener("touchstart", function (e) {
        isDragging = true; prevX = e.touches[0].clientX; prevY = e.touches[0].clientY;
      }, { passive: true });
      canvas.addEventListener("touchend",   function () { isDragging = false; });
      canvas.addEventListener("touchmove",  function (e) {
        if (!isDragging) return;
        velX = (e.touches[0].clientX - prevX) * 0.012;
        velY = (e.touches[0].clientY - prevY) * 0.008;
        rotY += velX; rotX += velY;
        rotX = Math.max(-0.7, Math.min(0.7, rotX));
        prevX = e.touches[0].clientX; prevY = e.touches[0].clientY;
      }, { passive: true });

      // ── Color picker ──
      document.querySelectorAll(".nail3d-color-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {
          document.querySelectorAll(".nail3d-color-btn").forEach(function (b) { b.classList.remove("active"); });
          btn.classList.add("active");
          const hex = btn.getAttribute("data-color");
          bodyMat.color.set(new THREE.Color(hex));
          bodyMat.opacity = hex === "#ffffff" ? 0.75 : 0.88;
        });
      });

      // ── Animate — giảm auto-spin speed trên mobile ──
      let autoRotY = 0;
      const spinSpeed = isMobile ? 0.003 : 0.004;

      // Dừng render khi tab bị ẩn để tiết kiệm pin
      let isVisible = true;
      document.addEventListener("visibilitychange", function () {
        isVisible = !document.hidden;
      });

      // Pause khi canvas ra khỏi viewport (IntersectionObserver)
      let inView = true;
      if ("IntersectionObserver" in window) {
        new IntersectionObserver(function (entries) {
          inView = entries[0].isIntersecting;
        }, { threshold: 0.1 }).observe(canvas);
      }

      function animate() {
        requestAnimationFrame(animate);
        if (!isVisible || !inView) return; 

        if (!isDragging) {
          velX *= 0.92; velY *= 0.92;
          rotY += velX; rotX += velY;
          autoRotY += spinSpeed;
        }
        group.rotation.y = rotY + autoRotY;
        group.rotation.x = rotX;
        group.position.y = -0.5 + Math.sin(Date.now() * 0.001) * 0.08;

        renderer.render(scene, camera);
      }
      animate();
    }
  })();
});