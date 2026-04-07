/**
 * Fortuna Beauty – Custom JavaScript
 * Clean rewrite: Three.js loaded once, no conflicts, mobile-safe
 */

document.addEventListener("DOMContentLoaded", function () {
  /* ── Global flags ─────────────────────────────────────────────────────── */
  const isMobile =
    /Android|iPhone|iPad|iPod|Mobile/i.test(navigator.userAgent) ||
    window.innerWidth < 768;

  /* ── 1. AOS ───────────────────────────────────────────────────────────── */
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: isMobile ? 600 : 800,
      easing: "ease-in-out",
      once: true,
      offset: 60,
    });
  }

  /* ── 2. Navbar scroll ─────────────────────────────────────────────────── */
  const navbar = document.getElementById("mainNavbar");
  if (navbar) {
    let _t = false;
    window.addEventListener(
      "scroll",
      function () {
        if (!_t) {
          requestAnimationFrame(function () {
            navbar.classList.toggle("scrolled", window.scrollY > 50);
            _t = false;
          });
          _t = true;
        }
      },
      { passive: true },
    );
  }

  /* ── 3. Scroll-to-top button ──────────────────────────────────────────── */
  const scrollBtn = document.getElementById("scrollToTop");
  if (scrollBtn) {
    let _t = false;
    window.addEventListener(
      "scroll",
      function () {
        if (!_t) {
          requestAnimationFrame(function () {
            scrollBtn.classList.toggle("visible", window.scrollY > 300);
            _t = false;
          });
          _t = true;
        }
      },
      { passive: true },
    );
    scrollBtn.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /* ── 4. Active nav link ───────────────────────────────────────────────── */
  const curPath = window.location.pathname.replace(/\/$/, "") || "/";
  document.querySelectorAll(".elux-navbar .nav-link").forEach(function (link) {
    try {
      const lp =
        new URL(
          link.getAttribute("href") || "",
          location.origin,
        ).pathname.replace(/\/$/, "") || "/";
      if (lp === curPath) link.classList.add("active");
    } catch (e) {}
  });

  /* ── 5. Close navbar on outside click ────────────────────────────────── */
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

  /* ── 6. Gallery Swiper ────────────────────────────────────────────────── */
  if (
    document.querySelector(".gallery-swiper") &&
    typeof Swiper !== "undefined"
  ) {
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
        768: { slidesPerView: 3, spaceBetween: 16, centeredSlides: false },
        992: { slidesPerView: 4, spaceBetween: 16, centeredSlides: false },
        1200: { slidesPerView: 4.5, spaceBetween: 16, centeredSlides: false },
      },
    });
  }

  /* ── 7. Floating hearts (homepage only) ───────────────────────────────── */
  if (document.querySelector('main[data-page="home"]')) {
    const interval = isMobile ? 1200 : 400;
    const maxH = isMobile ? 6 : 20;
    let count = 0;
    setInterval(function () {
      if (count >= maxH) return;
      count++;
      const h = document.createElement("div");
      h.textContent = "❤";
      h.className = "heart-up";
      h.style.left = Math.random() * 100 + "vw";
      const sz = Math.random() * 15 + 10;
      h.style.fontSize = sz + "px";
      const dur = Math.random() * 3 + 5;
      h.style.animationDuration = dur + "s";
      h.style.opacity = Math.random() * 0.5 + 0.3;
      document.body.appendChild(h);
      setTimeout(function () {
        h.remove();
        count--;
      }, dur * 1000);
    }, interval);
  }

  /* ── 8. Cursor trail (desktop) ────────────────────────────────────────── */
  if (!isMobile && window.matchMedia("(hover: hover)").matches) {
    const tc = ["#e8a2ad", "#d68c96", "#ff6b9d", "#ffb3c6", "#ff85a1"];
    let last = 0;
    document.addEventListener("mousemove", function (e) {
      const now = Date.now();
      if (now - last < 60) return;
      last = now;
      const h = document.createElement("div");
      h.textContent = "♥";
      h.style.cssText =
        "position:fixed;pointer-events:none;z-index:99999;font-size:" +
        (Math.random() * 12 + 8) +
        "px;color:" +
        tc[Math.floor(Math.random() * tc.length)] +
        ";left:" +
        (e.clientX - 6) +
        "px;top:" +
        (e.clientY - 6) +
        "px;opacity:1;transition:transform .7s ease-out,opacity .7s ease-out;user-select:none;will-change:transform,opacity;line-height:1;";
      document.body.appendChild(h);
      const dx = (Math.random() - 0.5) * 50,
        dy = -(Math.random() * 50 + 20);
      requestAnimationFrame(function () {
        requestAnimationFrame(function () {
          h.style.transform = "translate(" + dx + "px," + dy + "px) scale(.2)";
          h.style.opacity = "0";
        });
      });
      setTimeout(function () {
        h.remove();
      }, 700);
    });
  }

  /* ── 9. Hero parallax image ───────────────────────────────────────────── */
  if (!isMobile) {
    const heroImg = document.querySelector(".hero-image img");
    const heroSec = document.querySelector(".hero-section");
    if (heroImg && heroSec) {
      heroImg.closest(".hero-image").classList.add("parallax-img");
      let _pt = false;
      window.addEventListener(
        "scroll",
        function () {
          if (_pt) return;
          _pt = true;
          requestAnimationFrame(function () {
            if (window.scrollY < heroSec.offsetTop + heroSec.offsetHeight)
              heroImg.style.transform =
                "translateY(" + window.scrollY * 0.18 + "px) scale(1.08)";
            _pt = false;
          });
        },
        { passive: true },
      );
    }
  }

  /* =========================================================================
     THREE.JS — load once, then init all 3D features
     ========================================================================= */
  const needs3D = !!(
    document.getElementById("nail3d-canvas") ||
    document.getElementById("hero-main-bottle") ||
    document.getElementById("nav-canvas")
  );

  /* ── Canvas 2D fallback helpers (dùng khi WebGL / Three.js không load) ── */
  function lightenHex(hex, amt) {
    try {
      const n = parseInt(hex.replace("#", ""), 16);
      const r = Math.min(255, (n >> 16) + amt);
      const g = Math.min(255, ((n >> 8) & 0xff) + amt);
      const b = Math.min(255, (n & 0xff) + amt);
      return "#" + ((1 << 24) | (r << 16) | (g << 8) | b).toString(16).slice(1);
    } catch (e) {
      return hex;
    }
  }

  /* Vẽ 5 móng tay 2D lên canvas khi WebGL thất bại */
  function drawFallbackNails(id, color, opts) {
    const canvas = document.getElementById(id);
    if (!canvas) return;
    canvas.classList.add("webgl-ready");
    const W = canvas.width || parseInt(canvas.style.width) || 560;
    const H = canvas.height || parseInt(canvas.style.height) || 420;
    canvas.width = W;
    canvas.height = H;
    const ctx = canvas.getContext("2d");
    if (!ctx) return;
    ctx.clearRect(0, 0, W, H);

    const o = opts || {};
    const nails = [-110, -58, 0, 58, 110];
    const nW = 42,
      nH = 68;
    const baseY = H / 2 + 40;
    const bgCol = o.bg || "#1a0f13";

    /* background */
    const bgGrad = ctx.createLinearGradient(0, 0, W, H);
    bgGrad.addColorStop(0, bgCol);
    bgGrad.addColorStop(1, o.bg2 || "#2d1520");
    ctx.fillStyle = bgGrad;
    ctx.fillRect(0, 0, W, H);

    /* ambient glow */
    const glow = ctx.createRadialGradient(
      W / 2,
      baseY - 20,
      10,
      W / 2,
      baseY - 20,
      180,
    );
    glow.addColorStop(0, color + "33");
    glow.addColorStop(1, "transparent");
    ctx.fillStyle = glow;
    ctx.fillRect(0, 0, W, H);

    nails.forEach(function (dx, i) {
      const cx = W / 2 + dx;
      const cy = baseY;
      const ht = nH - Math.abs(dx) * 0.05; /* outer fingers slightly shorter */

      /* finger / skin */
      ctx.save();
      ctx.fillStyle = "#f2c9a8";
      const fW = 26,
        fH = 55;
      roundRect(ctx, cx - fW / 2, cy - fH + 10, fW, fH, 10);
      ctx.fill();
      ctx.restore();

      /* nail body */
      ctx.save();
      const grad = ctx.createLinearGradient(
        cx - nW / 2,
        cy - ht,
        cx + nW / 2,
        cy - ht + nH * 0.4,
      );
      grad.addColorStop(0, lightenHex(color, 25));
      grad.addColorStop(1, color);
      ctx.fillStyle = grad;
      /* almond-ish shape using bezier */
      ctx.beginPath();
      ctx.moveTo(cx - nW / 2, cy);
      ctx.lineTo(cx - nW / 2, cy - ht * 0.55);
      ctx.bezierCurveTo(
        cx - nW / 2,
        cy - ht,
        cx + nW / 2,
        cy - ht,
        cx + nW / 2,
        cy - ht * 0.55,
      );
      ctx.lineTo(cx + nW / 2, cy);
      ctx.closePath();
      ctx.fill();

      /* shine streak */
      ctx.fillStyle = "rgba(255,255,255,0.28)";
      ctx.beginPath();
      ctx.ellipse(
        cx - nW * 0.18,
        cy - ht * 0.65,
        nW * 0.1,
        ht * 0.2,
        -0.3,
        0,
        Math.PI * 2,
      );
      ctx.fill();

      /* top highlight rim */
      ctx.strokeStyle = "rgba(255,255,255,0.15)";
      ctx.lineWidth = 1.5;
      ctx.beginPath();
      ctx.moveTo(cx - nW / 2 + 2, cy - ht * 0.55);
      ctx.bezierCurveTo(
        cx - nW / 2 + 2,
        cy - ht + 3,
        cx + nW / 2 - 2,
        cy - ht + 3,
        cx + nW / 2 - 2,
        cy - ht * 0.55,
      );
      ctx.stroke();

      ctx.restore();
    });

    /* hint text */
    ctx.fillStyle = "rgba(255,255,255,0.22)";
    ctx.font = "500 11px Poppins, sans-serif";
    ctx.textAlign = "center";
    ctx.letterSpacing = "2px";
    ctx.fillText("✦ 3D VIEW UNAVAILABLE ✦", W / 2, H - 18);
  }

  /* Vẽ chai nail-polish 2D đơn giản */
  function drawFallbackBottle(id, color) {
    const canvas = document.getElementById(id);
    if (!canvas) return;
    canvas.classList.add("webgl-ready");
    const W = canvas.width || parseInt(canvas.style.width) || 480;
    const H = canvas.height || parseInt(canvas.style.height) || 480;
    canvas.width = W;
    canvas.height = H;
    const ctx = canvas.getContext("2d");
    if (!ctx) return;
    ctx.clearRect(0, 0, W, H);

    const cx = W / 2,
      cy = H / 2 + 20;
    /* body */
    const bGrad = ctx.createLinearGradient(cx - 55, cy - 110, cx + 55, cy + 80);
    bGrad.addColorStop(0, lightenHex(color, 30));
    bGrad.addColorStop(0.6, color);
    bGrad.addColorStop(1, lightenHex(color, -20));
    ctx.fillStyle = bGrad;
    roundRect(ctx, cx - 55, cy - 110, 110, 190, 18);
    ctx.fill();
    /* shine */
    ctx.fillStyle = "rgba(255,255,255,0.22)";
    ctx.beginPath();
    ctx.ellipse(cx - 22, cy - 50, 14, 55, -0.2, 0, Math.PI * 2);
    ctx.fill();
    /* neck */
    ctx.fillStyle = "#f0f0f0";
    roundRect(ctx, cx - 20, cy - 148, 40, 42, 6);
    ctx.fill();
    /* cap */
    ctx.fillStyle = "#2a1a1e";
    roundRect(ctx, cx - 24, cy - 220, 48, 76, 8);
    ctx.fill();
    /* base */
    ctx.fillStyle = "#1a0f13";
    roundRect(ctx, cx - 60, cy + 77, 120, 12, 4);
    ctx.fill();
    /* brush rod */
    ctx.strokeStyle = "#1a1a1a";
    ctx.lineWidth = 4;
    ctx.beginPath();
    ctx.moveTo(cx, cy - 148);
    ctx.lineTo(cx, cy - 220);
    ctx.stroke();
  }

  function roundRect(ctx, x, y, w, h, r) {
    ctx.beginPath();
    ctx.moveTo(x + r, y);
    ctx.lineTo(x + w - r, y);
    ctx.arcTo(x + w, y, x + w, y + r, r);
    ctx.lineTo(x + w, y + h - r);
    ctx.arcTo(x + w, y + h, x + w - r, y + h, r);
    ctx.lineTo(x + r, y + h);
    ctx.arcTo(x, y + h, x, y + h - r, r);
    ctx.lineTo(x, y + r);
    ctx.arcTo(x, y, x + r, y, r);
    ctx.closePath();
  }

  function onThreeFail() {
    /* CDN thất bại — vẽ fallback 2D cho tất cả canvas */
    drawFallbackNails("nav-canvas", "#d68c96");
    drawFallbackBottle("nail3d-canvas", "#d68c96");
    /* Ẩn hero-bottle-float vì không có WebGL */
    const bf = document.querySelector(".hero-bottle-float");
    if (bf) bf.style.display = "none";
  }

  if (needs3D) {
    if (typeof THREE !== "undefined") {
      init3DAll();
    } else {
      const s = document.createElement("script");
      s.src =
        "https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js";
      s.onload = init3DAll;
      s.onerror = onThreeFail;
      /* Timeout safety: nếu sau 8s vẫn chưa load → fallback */
      const _fbTimer = setTimeout(function () {
        if (typeof THREE === "undefined") onThreeFail();
      }, 8000);
      s.onload = function () {
        clearTimeout(_fbTimer);
        init3DAll();
      };
      document.head.appendChild(s);
    }
  }

  /* ── Hero: floating mini-bottles background (pure 2D, no THREE) ──────── */
  (function () {
    const bg = document.getElementById("hero-bottles-canvas");
    if (!bg) return;
    const ctx = bg.getContext("2d");

    function resize() {
      bg.width =
        (bg.parentElement && bg.parentElement.offsetWidth) || window.innerWidth;
      bg.height =
        (bg.parentElement && bg.parentElement.offsetHeight) ||
        window.innerHeight;
    }
    resize();
    window.addEventListener("resize", resize, { passive: true });

    const COLORS = [
      "#d68c96",
      "#c0392b",
      "#8e44ad",
      "#e67e22",
      "#2c3e50",
      "#f9ca24",
      "#e8a2ad",
    ];
    const COUNT = isMobile ? 5 : 12;
    const bots = Array.from({ length: COUNT }, function () {
      return {
        x: Math.random() * window.innerWidth,
        y: Math.random() * window.innerHeight,
        vy: -(Math.random() * 0.3 + 0.08),
        vx: (Math.random() - 0.5) * 0.12,
        rot: Math.random() * Math.PI * 2,
        vr: (Math.random() - 0.5) * 0.007,
        sc: Math.random() * 0.5 + 0.2,
        al: Math.random() * 0.15 + 0.05,
        col: COLORS[Math.floor(Math.random() * COLORS.length)],
      };
    });

    let mx = 0,
      my = 0;
    if (!isMobile) {
      window.addEventListener(
        "mousemove",
        function (e) {
          mx = (e.clientX / window.innerWidth - 0.5) * 16;
          my = (e.clientY / window.innerHeight - 0.5) * 10;
        },
        { passive: true },
      );
    }

    /* roundRect polyfill — works on all browsers */
    function rRect(x, y, w, h, r) {
      ctx.beginPath();
      ctx.moveTo(x + r, y);
      ctx.lineTo(x + w - r, y);
      ctx.arcTo(x + w, y, x + w, y + r, r);
      ctx.lineTo(x + w, y + h - r);
      ctx.arcTo(x + w, y + h, x + w - r, y + h, r);
      ctx.lineTo(x + r, y + h);
      ctx.arcTo(x, y + h, x, y + h - r, r);
      ctx.lineTo(x, y + r);
      ctx.arcTo(x, y, x + r, y, r);
      ctx.closePath();
    }

    function drawBot(b) {
      ctx.save();
      ctx.globalAlpha = b.al;
      ctx.translate(b.x + mx * b.sc, b.y + my * b.sc);
      ctx.rotate(b.rot);
      ctx.scale(b.sc, b.sc);
      ctx.fillStyle = b.col;
      rRect(-12, -26, 24, 42, 7);
      ctx.fill();
      rRect(-6, -40, 12, 16, 4);
      ctx.fill();
      ctx.fillStyle = "#2a1a1e";
      rRect(-7, -50, 14, 13, 4);
      ctx.fill();
      ctx.fillStyle = "rgba(255,255,255,.2)";
      ctx.beginPath();
      ctx.ellipse(-3, -14, 3, 8, -0.3, 0, Math.PI * 2);
      ctx.fill();
      ctx.restore();
    }

    let vis = true;
    document.addEventListener("visibilitychange", function () {
      vis = !document.hidden;
    });
    (function tick() {
      requestAnimationFrame(tick);
      if (!vis) return;
      ctx.clearRect(0, 0, bg.width, bg.height);
      bots.forEach(function (b) {
        b.y += b.vy;
        b.x += b.vx;
        b.rot += b.vr;
        if (b.y < -80) {
          b.y = bg.height + 80;
          b.x = Math.random() * bg.width;
        }
        if (b.x < -80) b.x = bg.width + 80;
        if (b.x > bg.width + 80) b.x = -80;
        drawBot(b);
      });
    })();
  })();

  /* =========================================================================
     All THREE.js features — called after THREE is confirmed loaded
     ========================================================================= */
  function init3DAll() {
    /* Đánh dấu webgl-ready để CSS ẩn fallback placeholders */
    ["nail3d-canvas", "nav-canvas", "hero-main-bottle"].forEach(function (id) {
      var el = document.getElementById(id);
      if (el) el.classList.add("webgl-ready");
    });
    /* Hiện hero-bottle-float khi Three.js sẵn sàng */
    var bf = document.querySelector(".hero-bottle-float");
    if (bf) bf.classList.add("webgl-ready");

    initNail3DSection();
    initHeroBottle();
    initNailVisualizer();
  }

  /* ── nail3d-section (Premium Collection) ─────────────────────────────── */
  function initNail3DSection() {
    const canvas = document.getElementById("nail3d-canvas");
    if (!canvas) return;
    const SEG = isMobile ? 24 : 48,
      SEG_LO = isMobile ? 8 : 12;

    function getSize() {
      const vw = window.innerWidth;
      if (vw < 576) {
        const w = Math.round(vw * 0.85);
        return { w, h: w };
      }
      if (vw < 992) {
        const w = Math.round(vw * 0.55);
        return { w, h: w };
      }
      return { w: 480, h: 480 };
    }
    function applySize() {
      const { w, h } = getSize();
      canvas.width = w;
      canvas.height = h;
      canvas.style.width = w + "px";
      canvas.style.height = h + "px";
      return { w, h };
    }
    let { w: W, h: H } = applySize();

    const renderer = new THREE.WebGLRenderer({
      canvas,
      antialias: !isMobile,
      alpha: true,
      powerPreference: isMobile ? "low-power" : "high-performance",
    });
    renderer.setPixelRatio(
      isMobile ? 1 : Math.min(window.devicePixelRatio, 1.5),
    );
    renderer.setSize(W, H);
    renderer.shadowMap.enabled = !isMobile;
    if (!isMobile) renderer.shadowMap.type = THREE.PCFSoftShadowMap;
    const scene = new THREE.Scene(),
      camera = new THREE.PerspectiveCamera(45, W / H, 0.1, 100);
    camera.position.set(0, 1.5, 7);

    let rT;
    window.addEventListener("resize", function () {
      clearTimeout(rT);
      rT = setTimeout(function () {
        const { w, h } = applySize();
        renderer.setSize(w, h);
        camera.aspect = w / h;
        camera.updateProjectionMatrix();
      }, 200);
    });

    scene.add(new THREE.AmbientLight(0xfff0f5, isMobile ? 0.9 : 0.6));
    const kl = new THREE.DirectionalLight(0xffffff, 1.2);
    kl.position.set(3, 6, 4);
    kl.castShadow = !isMobile;
    scene.add(kl);
    if (!isMobile) {
      const fl = new THREE.PointLight(0xffb3c6, 0.8, 20);
      fl.position.set(-4, 2, 2);
      scene.add(fl);
      const rl = new THREE.PointLight(0xe8a2ad, 0.5, 15);
      rl.position.set(0, -3, -4);
      scene.add(rl);
    }

    const group = new THREE.Group();
    scene.add(group);
    const bodyMat = isMobile
      ? new THREE.MeshStandardMaterial({
          color: new THREE.Color("#d68c96"),
          metalness: 0.1,
          roughness: 0.2,
          transparent: true,
          opacity: 0.88,
        })
      : new THREE.MeshPhysicalMaterial({
          color: new THREE.Color("#d68c96"),
          metalness: 0.05,
          roughness: 0.08,
          transmission: 0.55,
          thickness: 1.2,
          transparent: true,
          opacity: 0.88,
        });
    const neckMat = new THREE.MeshStandardMaterial({
      color: 0xf0f0f0,
      metalness: 0.2,
      roughness: 0.1,
    });
    const capMat = new THREE.MeshStandardMaterial({
      color: 0x2a1a1e,
      metalness: 0.6,
      roughness: 0.15,
    });
    const baseMat = new THREE.MeshStandardMaterial({
      color: 0x1a0f13,
      metalness: 0.3,
      roughness: 0.2,
    });
    function addM(geo, mat, y, sh) {
      const m = new THREE.Mesh(geo, mat);
      m.position.y = y;
      if (sh && !isMobile) m.castShadow = true;
      group.add(m);
      return m;
    }
    addM(new THREE.CylinderGeometry(0.72, 0.82, 3.2, SEG), bodyMat, 0, true);
    addM(
      new THREE.CylinderGeometry(0.38, 0.72, 0.7, SEG),
      bodyMat,
      1.95,
      false,
    );
    addM(new THREE.CylinderGeometry(0.3, 0.38, 0.6, SEG), neckMat, 2.6, false);
    addM(new THREE.CylinderGeometry(0.34, 0.34, 1.1, SEG), capMat, 3.5, false);
    addM(
      new THREE.SphereGeometry(
        0.34,
        SEG,
        SEG / 2,
        0,
        Math.PI * 2,
        0,
        Math.PI / 2,
      ),
      capMat,
      4.05,
      false,
    );
    addM(
      new THREE.CylinderGeometry(0.82, 0.82, 0.12, SEG),
      baseMat,
      -1.66,
      false,
    );
    if (!isMobile)
      addM(
        new THREE.CylinderGeometry(0.74, 0.74, 1.2, SEG, 1, true),
        new THREE.MeshStandardMaterial({
          color: 0xffffff,
          transparent: true,
          opacity: 0.18,
          side: THREE.FrontSide,
        }),
        -0.2,
        false,
      );
    addM(
      new THREE.CylinderGeometry(0.04, 0.04, 4.8, SEG_LO),
      new THREE.MeshStandardMaterial({ color: 0x1a1a1a }),
      0.6,
      false,
    );
    group.position.y = -0.5;

    let drag = false,
      px = 0,
      py = 0,
      rotX = 0,
      rotY = 0,
      vx = 0,
      vy = 0;
    canvas.addEventListener("mousedown", function (e) {
      drag = true;
      px = e.clientX;
      py = e.clientY;
      vx = vy = 0;
    });
    window.addEventListener("mouseup", function () {
      drag = false;
    });
    window.addEventListener("mousemove", function (e) {
      if (!drag) return;
      vx = (e.clientX - px) * 0.012;
      vy = (e.clientY - py) * 0.008;
      rotY += vx;
      rotX += vy;
      rotX = Math.max(-0.7, Math.min(0.7, rotX));
      px = e.clientX;
      py = e.clientY;
    });
    canvas.addEventListener(
      "touchstart",
      function (e) {
        drag = true;
        px = e.touches[0].clientX;
        py = e.touches[0].clientY;
      },
      { passive: true },
    );
    canvas.addEventListener("touchend", function () {
      drag = false;
    });
    canvas.addEventListener(
      "touchmove",
      function (e) {
        if (!drag) return;
        vx = (e.touches[0].clientX - px) * 0.012;
        vy = (e.touches[0].clientY - py) * 0.008;
        rotY += vx;
        rotX += vy;
        rotX = Math.max(-0.7, Math.min(0.7, rotX));
        px = e.touches[0].clientX;
        py = e.touches[0].clientY;
      },
      { passive: true },
    );
    document.querySelectorAll(".nail3d-color-btn").forEach(function (btn) {
      btn.addEventListener("click", function () {
        document.querySelectorAll(".nail3d-color-btn").forEach(function (b) {
          b.classList.remove("active");
        });
        btn.classList.add("active");
        const hex = btn.getAttribute("data-color");
        bodyMat.color.set(new THREE.Color(hex));
        bodyMat.opacity = hex === "#ffffff" ? 0.75 : 0.88;
      });
    });

    let autoY = 0,
      vis = true,
      inView = false;
    document.addEventListener("visibilitychange", function () {
      vis = !document.hidden;
    });
    if ("IntersectionObserver" in window)
      new IntersectionObserver(
        function (e) {
          inView = e[0].isIntersecting;
        },
        { threshold: 0.1 },
      ).observe(canvas);
    else inView = true;
    (function animate() {
      requestAnimationFrame(animate);
      if (!vis || !inView) return;
      if (!drag) {
        vx *= 0.92;
        vy *= 0.92;
        rotY += vx;
        rotX += vy;
        autoY += isMobile ? 0.003 : 0.004;
      }
      group.rotation.y = rotY + autoY;
      group.rotation.x = rotX;
      group.position.y = -0.5 + Math.sin(Date.now() * 0.001) * 0.08;
      renderer.render(scene, camera);
    })();
  }

  /* ── Hero floating bottle overlay (small, 180px) ─────────────────────── */
  function initHeroBottle() {
    const canvas = document.getElementById("hero-main-bottle");
    if (!canvas) return;
    const SEG = isMobile ? 18 : 36;

    function applySize() {
      const vw = window.innerWidth;
      const w = vw < 576 ? 130 : vw < 992 ? 150 : 180;
      const h = Math.round(w * 1.22);
      canvas.width = w;
      canvas.height = h;
      canvas.style.width = w + "px";
      canvas.style.height = h + "px";
      return { w, h };
    }
    let { w: W, h: H } = applySize();
    let rT;
    window.addEventListener("resize", function () {
      clearTimeout(rT);
      rT = setTimeout(function () {
        const s = applySize();
        renderer.setSize(s.w, s.h);
        camera.aspect = s.w / s.h;
        camera.updateProjectionMatrix();
      }, 200);
    });

    const renderer = new THREE.WebGLRenderer({
      canvas,
      antialias: false,
      alpha: true,
      powerPreference: "low-power",
    });
    renderer.setPixelRatio(1);
    renderer.setSize(W, H);
    const scene = new THREE.Scene(),
      camera = new THREE.PerspectiveCamera(44, W / H, 0.1, 100);
    camera.position.set(0, 1.4, 7);
    scene.add(new THREE.AmbientLight(0xffe8f0, 0.9));
    const kl = new THREE.DirectionalLight(0xffffff, 1.3);
    kl.position.set(3, 6, 4);
    scene.add(kl);
    const fl = new THREE.PointLight(0xffb3c6, 0.7, 18);
    fl.position.set(-3, 2, 2);
    scene.add(fl);

    const group = new THREE.Group();
    scene.add(group);
    const bodyMat = new THREE.MeshStandardMaterial({
      color: new THREE.Color("#d68c96"),
      metalness: 0.1,
      roughness: 0.15,
      transparent: true,
      opacity: 0.92,
    });
    const neckMat = new THREE.MeshStandardMaterial({
      color: 0xf0f0f0,
      metalness: 0.2,
      roughness: 0.1,
    });
    const capMat = new THREE.MeshStandardMaterial({
      color: 0x2a1a1e,
      metalness: 0.6,
      roughness: 0.15,
    });
    const baseMat = new THREE.MeshStandardMaterial({
      color: 0x1a0f13,
      metalness: 0.3,
      roughness: 0.2,
    });
    function addM(geo, mat, y) {
      const m = new THREE.Mesh(geo, mat);
      m.position.y = y;
      group.add(m);
    }
    addM(new THREE.CylinderGeometry(0.72, 0.82, 3.2, SEG), bodyMat, 0);
    addM(new THREE.CylinderGeometry(0.38, 0.72, 0.7, SEG), bodyMat, 1.95);
    addM(new THREE.CylinderGeometry(0.3, 0.38, 0.6, SEG), neckMat, 2.6);
    addM(new THREE.CylinderGeometry(0.34, 0.34, 1.1, SEG), capMat, 3.5);
    addM(
      new THREE.SphereGeometry(
        0.34,
        SEG,
        SEG / 2,
        0,
        Math.PI * 2,
        0,
        Math.PI / 2,
      ),
      capMat,
      4.05,
    );
    addM(new THREE.CylinderGeometry(0.82, 0.82, 0.12, SEG), baseMat, -1.66);
    addM(
      new THREE.CylinderGeometry(0.04, 0.04, 4.8, 10),
      new THREE.MeshStandardMaterial({ color: 0x1a1a1a }),
      0.6,
    );
    group.position.y = -0.5;

    document.querySelectorAll(".nail3d-color-btn").forEach(function (btn) {
      btn.addEventListener("click", function () {
        bodyMat.color.set(new THREE.Color(btn.getAttribute("data-color")));
      });
    });

    let drag = false,
      px = 0,
      py = 0,
      rotX = 0,
      rotY = 0,
      vx = 0,
      vy = 0,
      autoY = 0;
    canvas.addEventListener("mousedown", function (e) {
      drag = true;
      px = e.clientX;
      py = e.clientY;
      vx = vy = 0;
    });
    window.addEventListener("mouseup", function () {
      drag = false;
    });
    window.addEventListener("mousemove", function (e) {
      if (!drag) return;
      vx = (e.clientX - px) * 0.013;
      vy = (e.clientY - py) * 0.009;
      rotY += vx;
      rotX += vy;
      rotX = Math.max(-0.7, Math.min(0.7, rotX));
      px = e.clientX;
      py = e.clientY;
    });
    canvas.addEventListener(
      "touchstart",
      function (e) {
        drag = true;
        px = e.touches[0].clientX;
        py = e.touches[0].clientY;
      },
      { passive: true },
    );
    canvas.addEventListener("touchend", function () {
      drag = false;
    });
    canvas.addEventListener(
      "touchmove",
      function (e) {
        if (!drag) return;
        vx = (e.touches[0].clientX - px) * 0.013;
        vy = (e.touches[0].clientY - py) * 0.009;
        rotY += vx;
        rotX += vy;
        rotX = Math.max(-0.7, Math.min(0.7, rotX));
        px = e.touches[0].clientX;
        py = e.touches[0].clientY;
      },
      { passive: true },
    );

    let vis = true,
      inView = false;
    document.addEventListener("visibilitychange", function () {
      vis = !document.hidden;
    });
    if ("IntersectionObserver" in window)
      new IntersectionObserver(
        function (e) {
          inView = e[0].isIntersecting;
        },
        { threshold: 0.05 },
      ).observe(canvas);
    else inView = true;
    (function animate() {
      requestAnimationFrame(animate);
      if (!vis || !inView) return;
      if (!drag) {
        vx *= 0.91;
        vy *= 0.91;
        rotY += vx;
        rotX += vy;
        autoY += 0.005;
      }
      group.rotation.y = rotY + autoY;
      group.rotation.x = rotX;
      group.position.y = -0.5 + Math.sin(Date.now() * 0.0012) * 0.1;
      renderer.render(scene, camera);
    })();
  }

  /* ── Nail Art Visualizer — Pure Canvas 2D (WebGL-free) ──────────────── */
  function initNailVisualizer() {
    const canvas = document.getElementById("nav-canvas");
    if (!canvas) return;

    const ctx = canvas.getContext("2d");
    if (!ctx) return;
    canvas.classList.add("webgl-ready");

    let state = {
      shape: "square",
      color: "#d68c96",
      finish: "glossy",
      art: "none",
    };
    let animFrame = null;
    let shimmerPhase = 0;

    /* ── sizing ── */
    function applySize() {
      const vw = window.innerWidth;
      let w, h;
      if (vw < 576) {
        w = vw - 40;
        h = Math.round(w * 0.72);
      } else if (vw < 992) {
        w = Math.round(vw * 0.52);
        h = Math.round(w * 0.72);
      } else {
        w = 680;
        h = 480;
      }
      canvas.width = w;
      canvas.height = h;
      canvas.style.width = w + "px";
      canvas.style.height = h + "px";
      return { w, h };
    }
    let { w: W, h: H } = applySize();
    let rT;
    window.addEventListener(
      "resize",
      function () {
        clearTimeout(rT);
        rT = setTimeout(function () {
          var s = applySize();
          W = s.w;
          H = s.h;
          draw();
        }, 200);
      },
      { passive: true },
    );

    /* ── colour helpers ── */
    function hexToRgb(hex) {
      const n = parseInt(hex.replace("#", ""), 16);
      return { r: (n >> 16) & 255, g: (n >> 8) & 255, b: n & 255 };
    }
    function lighten(hex, amt) {
      const c = hexToRgb(hex);
      const r = Math.min(255, c.r + amt),
        g = Math.min(255, c.g + amt),
        b = Math.min(255, c.b + amt);
      return "rgb(" + r + "," + g + "," + b + ")";
    }
    function darken(hex, amt) {
      return lighten(hex, -amt);
    }
    function rgba(hex, a) {
      const c = hexToRgb(hex);
      return "rgba(" + c.r + "," + c.g + "," + c.b + "," + a + ")";
    }

    /* ── nail shape profiles (normalised 0-1) ── */
    const SHAPES = {
      square: { tip: 0, taper: 0.0, topR: 0.08 },
      squoval: { tip: 0, taper: 0.0, topR: 0.45 },
      oval: { tip: 0, taper: 0.0, topR: 1.0 },
      almond: { tip: 1, taper: 0.22, topR: 1.0 },
      stiletto: { tip: 2, taper: 0.38, topR: 1.0 },
      coffin: { tip: 3, taper: 0.28, topR: 0.12 },
    };

    /* Draw a single nail with skin finger */
    function drawNail(cx, baseY, nW, nH, shape, color, finish, art, shimmer) {
      const sp = SHAPES[shape] || SHAPES.square;
      const skinColor = "#f2c9a8";
      const fingerH = nH * 0.55;
      const fingerW = nW * 0.72;

      /* finger */
      ctx.save();
      ctx.fillStyle = skinColor;
      ctx.beginPath();
      ctx.roundRect(
        cx - fingerW / 2,
        baseY - fingerH + nH * 0.1,
        fingerW,
        fingerH,
        fingerW * 0.45,
      );
      ctx.fill();
      /* knuckle shadow */
      const kg = ctx.createLinearGradient(
        cx,
        baseY - fingerH + nH * 0.1,
        cx,
        baseY + nH * 0.1,
      );
      kg.addColorStop(0, "rgba(0,0,0,0.0)");
      kg.addColorStop(0.6, "rgba(0,0,0,0.07)");
      kg.addColorStop(1, "rgba(0,0,0,0.14)");
      ctx.fillStyle = kg;
      ctx.beginPath();
      ctx.roundRect(
        cx - fingerW / 2,
        baseY - fingerH + nH * 0.1,
        fingerW,
        fingerH,
        fingerW * 0.45,
      );
      ctx.fill();
      ctx.restore();

      /* nail plate path */
      ctx.save();
      const nLeft = cx - nW / 2,
        nTop = baseY - nH,
        nRight = cx + nW / 2,
        nBottom = baseY;

      ctx.beginPath();
      if (sp.tip === 0) {
        /* square / squoval / oval */
        const r = nW * sp.topR * 0.5;
        ctx.moveTo(nLeft, nBottom);
        ctx.lineTo(nLeft, nTop + r);
        ctx.arcTo(nLeft, nTop, nLeft + r, nTop, r);
        ctx.lineTo(nRight - r, nTop);
        ctx.arcTo(nRight, nTop, nRight, nTop + r, r);
        ctx.lineTo(nRight, nBottom);
        ctx.closePath();
      } else if (sp.tip === 1) {
        /* almond */
        const tw = nW * sp.taper;
        ctx.moveTo(nLeft, nBottom);
        ctx.lineTo(nLeft + tw * 0.3, nTop + nH * 0.25);
        ctx.quadraticCurveTo(nLeft + tw, nTop, cx, nTop - nH * 0.12);
        ctx.quadraticCurveTo(
          nRight - tw,
          nTop,
          nRight - tw * 0.3,
          nTop + nH * 0.25,
        );
        ctx.lineTo(nRight, nBottom);
        ctx.closePath();
      } else if (sp.tip === 2) {
        /* stiletto */
        const tw = nW * sp.taper;
        ctx.moveTo(nLeft, nBottom);
        ctx.lineTo(nLeft + tw * 0.5, nTop + nH * 0.2);
        ctx.lineTo(cx, nTop - nH * 0.22);
        ctx.lineTo(nRight - tw * 0.5, nTop + nH * 0.2);
        ctx.lineTo(nRight, nBottom);
        ctx.closePath();
      } else {
        /* coffin */
        const tw = nW * sp.taper;
        const flatW = nW * 0.42;
        ctx.moveTo(nLeft, nBottom);
        ctx.lineTo(nLeft + tw, nTop + nH * 0.18);
        ctx.lineTo(cx - flatW / 2, nTop);
        ctx.lineTo(cx + flatW / 2, nTop);
        ctx.lineTo(nRight - tw, nTop + nH * 0.18);
        ctx.lineTo(nRight, nBottom);
        ctx.closePath();
      }

      /* fill based on finish */
      let fillStyle;
      if (finish === "chrome") {
        const cg = ctx.createLinearGradient(nLeft, nTop, nRight, nBottom);
        cg.addColorStop(0.0, lighten(color, 80));
        cg.addColorStop(0.25, lighten(color, 30));
        cg.addColorStop(0.5, color);
        cg.addColorStop(0.75, darken(color, 30));
        cg.addColorStop(1.0, lighten(color, 50));
        fillStyle = cg;
      } else if (finish === "matte") {
        fillStyle = color;
      } else {
        /* glossy / glitter */
        const gg = ctx.createLinearGradient(cx, nTop, cx, nBottom);
        gg.addColorStop(0, lighten(color, 28));
        gg.addColorStop(0.4, lighten(color, 8));
        gg.addColorStop(1, darken(color, 12));
        fillStyle = gg;
      }
      ctx.fillStyle = fillStyle;
      ctx.fill();

      /* glitter speckles */
      if (finish === "glitter") {
        ctx.save();
        ctx.clip();
        for (let i = 0; i < 18; i++) {
          const gx = nLeft + Math.random() * nW;
          const gy = nTop + Math.random() * nH;
          const gr = Math.random() * 2.2 + 0.5;
          ctx.fillStyle =
            "rgba(255,255,255," + (Math.random() * 0.7 + 0.3) + ")";
          ctx.beginPath();
          ctx.arc(gx, gy, gr, 0, Math.PI * 2);
          ctx.fill();
        }
        ctx.restore();
      }

      /* glossy highlight streak */
      if (finish !== "matte") {
        ctx.save();
        ctx.clip ? ctx.clip() : null;
        const hx = cx - nW * 0.18;
        const hg = ctx.createRadialGradient(
          hx,
          nTop + nH * 0.18,
          0,
          hx,
          nTop + nH * 0.28,
          nW * 0.32,
        );
        hg.addColorStop(0, "rgba(255,255,255,0.55)");
        hg.addColorStop(1, "rgba(255,255,255,0)");
        ctx.fillStyle = hg;
        ctx.fill();

        /* shimmer sweep */
        if (finish !== "matte") {
          const sw = shimmer % 1;
          const sx = nLeft - nW * 0.2 + sw * nW * 1.6;
          const shg = ctx.createLinearGradient(
            sx - nW * 0.2,
            0,
            sx + nW * 0.2,
            0,
          );
          shg.addColorStop(0, "rgba(255,255,255,0)");
          shg.addColorStop(0.5, "rgba(255,255,255,0.22)");
          shg.addColorStop(1, "rgba(255,255,255,0)");
          ctx.fillStyle = shg;
          ctx.fill();
        }
        ctx.restore();
      }

      /* nail art overlays */
      if (art === "french") {
        ctx.save();
        /* clip to nail shape (redraw path) */
        ctx.beginPath();
        if (sp.tip === 0) {
          const r = nW * sp.topR * 0.5;
          ctx.moveTo(nLeft, nBottom);
          ctx.lineTo(nLeft, nTop + r);
          ctx.arcTo(nLeft, nTop, nLeft + r, nTop, r);
          ctx.lineTo(nRight - r, nTop);
          ctx.arcTo(nRight, nTop, nRight, nTop + r, r);
          ctx.lineTo(nRight, nBottom);
          ctx.closePath();
        } else {
          ctx.rect(nLeft, nTop, nW, nH);
        }
        ctx.clip();
        const tipH = nH * 0.22;
        const fg = ctx.createLinearGradient(cx, nTop, cx, nTop + tipH * 1.5);
        fg.addColorStop(0, "rgba(255,252,252,0.95)");
        fg.addColorStop(1, "rgba(255,252,252,0)");
        ctx.fillStyle = fg;
        ctx.fillRect(nLeft, nTop, nW, tipH * 1.5);
        ctx.restore();
      }

      if (art === "gems") {
        const gemPositions = [
          { dx: 0, dy: nH * 0.28 },
          { dx: -nW * 0.2, dy: nH * 0.38 },
          { dx: nW * 0.2, dy: nH * 0.38 },
        ];
        gemPositions.forEach(function (gp) {
          const gx = cx + gp.dx,
            gy = nTop + gp.dy;
          const gemR = nW * 0.1;
          const gemGrad = ctx.createRadialGradient(
            gx - gemR * 0.3,
            gy - gemR * 0.3,
            0,
            gx,
            gy,
            gemR,
          );
          gemGrad.addColorStop(0, "rgba(255,255,255,0.95)");
          gemGrad.addColorStop(0.4, "rgba(200,230,255,0.7)");
          gemGrad.addColorStop(1, "rgba(150,200,255,0.3)");
          ctx.beginPath();
          ctx.arc(gx, gy, gemR, 0, Math.PI * 2);
          ctx.fillStyle = gemGrad;
          ctx.fill();
          ctx.strokeStyle = "rgba(255,255,255,0.6)";
          ctx.lineWidth = 0.8;
          ctx.stroke();
        });
      }

      if (art === "glitter-tip") {
        ctx.save();
        ctx.beginPath();
        ctx.rect(nLeft, nTop, nW, nH * 0.35);
        ctx.clip();
        for (let i = 0; i < 22; i++) {
          const gx = nLeft + Math.random() * nW;
          const gy = nTop + Math.random() * nH * 0.35;
          const gr = Math.random() * 2.5 + 0.5;
          ctx.fillStyle =
            "rgba(255,200,50," + (Math.random() * 0.8 + 0.2) + ")";
          ctx.beginPath();
          ctx.arc(gx, gy, gr, 0, Math.PI * 2);
          ctx.fill();
        }
        ctx.restore();
      }

      /* subtle side-edge darkening (clip to nail shape, no stroke lines) */
      ctx.save();
      ctx.beginPath();
      if (sp.tip === 0) {
        const r2 = nW * sp.topR * 0.5;
        ctx.moveTo(nLeft, nBottom);
        ctx.lineTo(nLeft, nTop + r2);
        ctx.arcTo(nLeft, nTop, nLeft + r2, nTop, r2);
        ctx.lineTo(nRight - r2, nTop);
        ctx.arcTo(nRight, nTop, nRight, nTop + r2, r2);
        ctx.lineTo(nRight, nBottom);
        ctx.closePath();
      } else if (sp.tip === 1) {
        const tw2 = nW * sp.taper;
        ctx.moveTo(nLeft, nBottom);
        ctx.lineTo(nLeft + tw2 * 0.3, nTop + nH * 0.25);
        ctx.quadraticCurveTo(nLeft + tw2, nTop, cx, nTop - nH * 0.12);
        ctx.quadraticCurveTo(
          nRight - tw2,
          nTop,
          nRight - tw2 * 0.3,
          nTop + nH * 0.25,
        );
        ctx.lineTo(nRight, nBottom);
        ctx.closePath();
      } else if (sp.tip === 2) {
        const tw2 = nW * sp.taper;
        ctx.moveTo(nLeft, nBottom);
        ctx.lineTo(nLeft + tw2 * 0.5, nTop + nH * 0.2);
        ctx.lineTo(cx, nTop - nH * 0.22);
        ctx.lineTo(nRight - tw2 * 0.5, nTop + nH * 0.2);
        ctx.lineTo(nRight, nBottom);
        ctx.closePath();
      } else {
        const tw2 = nW * sp.taper;
        const flatW2 = nW * 0.42;
        ctx.moveTo(nLeft, nBottom);
        ctx.lineTo(nLeft + tw2, nTop + nH * 0.18);
        ctx.lineTo(cx - flatW2 / 2, nTop);
        ctx.lineTo(cx + flatW2 / 2, nTop);
        ctx.lineTo(nRight - tw2, nTop + nH * 0.18);
        ctx.lineTo(nRight, nBottom);
        ctx.closePath();
      }
      ctx.clip();
      const leftEdge = ctx.createLinearGradient(nLeft, 0, nLeft + nW * 0.2, 0);
      leftEdge.addColorStop(0, rgba(darken(color, 30), 0.3));
      leftEdge.addColorStop(1, "rgba(0,0,0,0)");
      ctx.fillStyle = leftEdge;
      ctx.fillRect(nLeft, nTop - nH * 0.3, nW * 0.2, nH * 1.6);
      const rightEdge = ctx.createLinearGradient(
        nRight,
        0,
        nRight - nW * 0.2,
        0,
      );
      rightEdge.addColorStop(0, rgba(darken(color, 30), 0.25));
      rightEdge.addColorStop(1, "rgba(0,0,0,0)");
      ctx.fillStyle = rightEdge;
      ctx.fillRect(nRight - nW * 0.2, nTop - nH * 0.3, nW * 0.2, nH * 1.6);
      ctx.restore();

      ctx.restore();
    }

    /* ── main draw ── */
    function draw() {
      ctx.clearRect(0, 0, W, H);

      /* background */
      const bg = ctx.createLinearGradient(0, 0, W, H);
      bg.addColorStop(0, "#fff5f7");
      bg.addColorStop(1, "#fce4ea");
      ctx.fillStyle = bg;
      ctx.fillRect(0, 0, W, H);

      /* subtle grid dots */
      ctx.fillStyle = "rgba(214,140,150,0.08)";
      for (let gx = 20; gx < W; gx += 32) {
        for (let gy = 20; gy < H; gy += 32) {
          ctx.beginPath();
          ctx.arc(gx, gy, 1.5, 0, Math.PI * 2);
          ctx.fill();
        }
      }

      /* palm base */
      const palmW = Math.min(W * 0.72, 480);
      const palmH = H * 0.14;
      const palmX = (W - palmW) / 2;
      const palmY = H - palmH * 0.6;
      const palmG = ctx.createLinearGradient(0, palmY, 0, palmY + palmH);
      palmG.addColorStop(0, "#f2c9a8");
      palmG.addColorStop(1, "#e8b896");
      ctx.fillStyle = palmG;
      ctx.beginPath();
      ctx.roundRect(palmX, palmY, palmW, palmH, palmH * 0.4);
      ctx.fill();

      /* 5 fingers */
      const FINGERS = [
        { offX: -0.36, nW: 0.11, nH: 0.38 },
        { offX: -0.18, nW: 0.12, nH: 0.44 },
        { offX: 0.0, nW: 0.13, nH: 0.46 },
        { offX: 0.18, nW: 0.12, nH: 0.44 },
        { offX: 0.36, nW: 0.11, nH: 0.38 },
      ];

      const baseY = palmY + palmH * 0.18;
      const refW = Math.min(W, 680);

      FINGERS.forEach(function (f) {
        const cx = W / 2 + f.offX * refW;
        const nW = f.nW * refW;
        const nH = f.nH * H;
        drawNail(
          cx,
          baseY,
          nW,
          nH,
          state.shape,
          state.color,
          state.finish,
          state.art,
          shimmerPhase,
        );
      });

      /* label */
      ctx.fillStyle = rgba(darken(state.color, 20), 0.55);
      ctx.font = "500 11px Poppins, sans-serif";
      ctx.textAlign = "center";
      ctx.fillText(
        "✦ " +
          state.shape.toUpperCase() +
          "  ·  " +
          state.finish.toUpperCase() +
          " ✦",
        W / 2,
        H - 10,
      );
    }

    /* ── animation loop (shimmer only) ── */
    (function tick() {
      animFrame = requestAnimationFrame(tick);
      shimmerPhase += 0.004;
      if (shimmerPhase > 1) shimmerPhase = 0;
      draw();
    })();

    /* ── wire up controls ── */
    function updateBadge() {
      const b = document.getElementById("nav-state-badge");
      if (!b) return;
      const sn =
        (document.querySelector(".nav-shape-btn.active span") || {})
          .textContent || state.shape;
      const cn =
        (document.getElementById("nav-color-name") || {}).textContent ||
        state.color;
      const fn = (
        (document.querySelector(".nav-finish-btn.active") || {}).textContent ||
        state.finish
      ).trim();
      b.textContent = sn + " · " + cn + " · " + fn;
    }

    document.querySelectorAll(".nav-shape-btn").forEach(function (btn) {
      btn.addEventListener("click", function () {
        document.querySelectorAll(".nav-shape-btn").forEach(function (b) {
          b.classList.remove("active");
        });
        btn.classList.add("active");
        state.shape = btn.getAttribute("data-shape");
        draw();
        updateBadge();
      });
    });
    document.querySelectorAll(".nav-color-dot").forEach(function (dot) {
      dot.addEventListener("click", function () {
        document.querySelectorAll(".nav-color-dot").forEach(function (d) {
          d.classList.remove("active");
        });
        dot.classList.add("active");
        state.color = dot.getAttribute("data-color");
        var nm = document.getElementById("nav-color-name");
        if (nm) nm.textContent = dot.getAttribute("data-name") || "";
        draw();
        updateBadge();
      });
    });
    var ch = document.getElementById("nav-custom-hex");
    if (ch)
      ch.addEventListener("input", function () {
        state.color = ch.value;
        document.querySelectorAll(".nav-color-dot").forEach(function (d) {
          d.classList.remove("active");
        });
        var nm = document.getElementById("nav-color-name");
        if (nm) nm.textContent = "Custom";
        draw();
        updateBadge();
      });
    document.querySelectorAll(".nav-finish-btn").forEach(function (btn) {
      btn.addEventListener("click", function () {
        document.querySelectorAll(".nav-finish-btn").forEach(function (b) {
          b.classList.remove("active");
        });
        btn.classList.add("active");
        state.finish = btn.getAttribute("data-finish");
        draw();
        updateBadge();
      });
    });
    document.querySelectorAll(".nav-art-btn").forEach(function (btn) {
      btn.addEventListener("click", function () {
        document.querySelectorAll(".nav-art-btn").forEach(function (b) {
          b.classList.remove("active");
        });
        btn.classList.add("active");
        state.art = btn.getAttribute("data-art");
        draw();
        updateBadge();
      });
    });
  }
}); /* end DOMContentLoaded */
