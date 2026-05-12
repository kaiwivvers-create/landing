import './bootstrap';

window.addEventListener('load', () => {
    const heroSection = document.getElementById('hero');
    const cameraSection = document.getElementById('camera-section');
    const cameraTrigger = document.getElementById('camera-trigger');
    const cameraContainer = document.getElementById('camera-container');
    const polaroidsSection = document.getElementById('polaroids-section');
    const polaroidCards = document.querySelectorAll('.polaroid-card');
    const resetButton = document.getElementById('reset-camera');
    
    const expandedModal = document.getElementById('expanded-modal');
    const closeModal = document.getElementById('close-modal');
    const modalImage = document.getElementById('modal-image');
    const modalCaption = document.getElementById('modal-caption');
    const modalTitle = document.getElementById('modal-title');
    const modalDesc = document.getElementById('modal-desc');
    const modalInfo = document.getElementById('modal-info');
    const modalImageContainer = document.getElementById('modal-image-container');

    // Project data
    const projectData = {
        1: { title: "Urban Exploration", desc: "A journey through the neon-lit streets of a bustling metropolis, capturing the essence of city life." },
        2: { title: "Coastal Serenity", desc: "The calming sound of waves and the soft touch of ocean breeze, frozen in time." },
        3: { title: "Rustic Mornings", desc: "The aroma of freshly brewed coffee in a quiet, cozy corner of a hidden gem." }
    };

    // 1. Camera Trigger
    if (cameraTrigger) {
        cameraTrigger.addEventListener('click', () => {
            if (cameraTrigger.classList.contains('snapped')) return;
            
            cameraTrigger.classList.add('snapped');
            if (cameraContainer) cameraContainer.classList.add('camera-sink');
            
            if (heroSection) heroSection.classList.add('content-blur');
            if (cameraSection) cameraSection.classList.add('content-blur');

            // Show polaroids
            if (polaroidsSection) {
                polaroidsSection.style.display = 'block';
                polaroidsSection.style.opacity = '1';
                
                polaroidCards.forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add('scattered', `scatter-${index + 1}`);
                        card.style.opacity = '1';
                        card.style.visibility = 'visible';
                    }, index * 100 + 50);
                });
            }
        });
    }

    // 2. Reset Camera
    if (resetButton) {
        resetButton.addEventListener('click', () => {
            cameraTrigger.classList.remove('snapped');
            
            polaroidCards.forEach((card) => {
                card.classList.remove('scattered', 'scatter-1', 'scatter-2', 'scatter-3');
                card.style.opacity = '0';
            });

            if (polaroidsSection) {
                polaroidsSection.style.opacity = '0';
                setTimeout(() => polaroidsSection.style.display = 'none', 500);
            }

            if (heroSection) heroSection.classList.remove('content-blur');
            if (cameraSection) cameraSection.classList.remove('content-blur');
            if (cameraContainer) cameraContainer.classList.remove('camera-sink');
            
            const anchor = document.getElementById('camera-anchor');
            if (anchor) anchor.scrollIntoView({ behavior: 'smooth' });
        });
    }

    // 3. Arrow & Card Clicks
    const arrow = document.getElementById('trigger-basketball-arrow');
    if (arrow) {
        arrow.addEventListener('click', () => triggerBasketballSequence());
    }

    polaroidCards.forEach(card => {
        card.addEventListener('click', () => openModal(card));
    });

    function openModal(card) {
        const id = card.getAttribute('data-id');
        const img = card.querySelector('img');
        const p = card.querySelector('p');
        const caption = p ? p.innerText : "Discovery";
        const data = (id && projectData[id]) ? projectData[id] : { title: caption, desc: "A special moment from the Narc Showroom collection." };

        if (expandedModal) {
            if (modalImage && img) modalImage.src = img.src;
            if (modalCaption) modalCaption.innerText = caption;
            if (modalTitle) modalTitle.innerText = data.title;
            if (modalDesc) modalDesc.innerText = data.desc;

            expandedModal.style.display = 'flex';
            setTimeout(() => {
                expandedModal.classList.remove('pointer-events-none', 'opacity-0');
                expandedModal.classList.add('opacity-100');
                if (modalImageContainer) modalImageContainer.classList.replace('scale-90', 'scale-100');
                if (modalInfo) {
                    modalInfo.classList.remove('opacity-0', 'translate-x-8');
                    modalInfo.classList.add('opacity-100', 'translate-x-0');
                }
            }, 10);
        }
    }

    function triggerBasketballSequence() {
        const basketballStage = document.getElementById('basketball-stage');
        if (polaroidsSection) polaroidsSection.style.display = 'none';
        if (basketballStage) basketballStage.style.display = 'block';
        
        const backBtn = document.getElementById('back-from-basketball');
        if (backBtn) backBtn.style.display = 'flex';
        
        const sequenceArrow = document.getElementById('sequence-arrow');
        if (sequenceArrow) sequenceArrow.classList.add('show-arrow');
        
        const basketball = document.getElementById('basketball');
        setTimeout(() => {
            if (basketball) basketball.classList.add('animate-basketball');
        }, 500);

        setTimeout(() => {
            if (sequenceArrow) sequenceArrow.classList.remove('show-arrow');
        }, 1500);

        setTimeout(() => {
            document.querySelectorAll('.extra-card').forEach((card, index) => {
                setTimeout(() => card.classList.add('show'), index * 300);
            });
        }, 3500);
    }

    if (closeModal) {
        closeModal.addEventListener('click', () => {
            if (expandedModal) {
                expandedModal.classList.remove('opacity-100');
                expandedModal.classList.add('opacity-0');
                setTimeout(() => expandedModal.style.display = 'none', 500);
            }
        });
    }

    const backFromBasketball = document.getElementById('back-from-basketball');
    if (backFromBasketball) {
        backFromBasketball.addEventListener('click', () => {
            const stage = document.getElementById('basketball-stage');
            if (stage) stage.style.display = 'none';
            if (backFromBasketball) backFromBasketball.style.display = 'none';
            document.querySelectorAll('.extra-card').forEach(card => card.classList.remove('show'));
            const basketball = document.getElementById('basketball');
            if (basketball) basketball.classList.remove('animate-basketball');
            if (resetButton) resetButton.click();
        });
    }

    document.querySelectorAll('.extra-card').forEach(card => {
        card.addEventListener('click', () => openModal(card));
    });
});
