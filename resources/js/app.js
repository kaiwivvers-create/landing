import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const cameraTrigger = document.getElementById('camera-trigger');
    const cameraSection = document.getElementById('camera-section');
    const polaroidsSection = document.getElementById('polaroids-section');
    const polaroidCards = document.querySelectorAll('.polaroid-card');
    
    const modal = document.getElementById('expanded-modal');
    const closeModalBtn = document.getElementById('close-modal');
    const modalImage = document.getElementById('modal-image');
    const modalCaption = document.getElementById('modal-caption');
    const modalTitle = document.getElementById('modal-title');
    
    const modalImageContainer = document.getElementById('modal-image-container');
    const modalInfo = document.getElementById('modal-info');

    // 1. Camera Click Event
    cameraTrigger.addEventListener('click', () => {
        // Drop the camera down
        cameraSection.classList.add('camera-eject');
        
        // Show the polaroids section
        setTimeout(() => {
            polaroidsSection.classList.remove('hidden');
            
            // Add scattering animations
            polaroidCards.forEach((card, index) => {
                card.classList.add(`scatter-${index + 1}`);
            });
        }, 300); // Slight delay after click
    });

    // 2. Polaroid Click Event (Expansion)
    polaroidCards.forEach(card => {
        card.addEventListener('click', () => {
            const imgEl = card.querySelector('img');
            const titleEl = card.querySelector('p');
            
            // Set modal content
            modalImage.src = imgEl.src;
            modalCaption.textContent = titleEl.textContent;
            modalTitle.textContent = titleEl.textContent; // Using caption as title for now
            
            // Show modal overlay
            modal.classList.remove('pointer-events-none', 'opacity-0');
            modal.classList.add('opacity-100');
            
            // Animate content inside modal
            setTimeout(() => {
                modalImageContainer.classList.remove('scale-90');
                modalImageContainer.classList.add('scale-100');
                
                modalInfo.classList.remove('opacity-0', 'translate-x-8');
                modalInfo.classList.add('opacity-100', 'translate-x-0');
            }, 100);
        });
    });

    // 3. Close Modal Event
    closeModalBtn.addEventListener('click', () => {
        // Revert inner animations first
        modalImageContainer.classList.remove('scale-100');
        modalImageContainer.classList.add('scale-90');
        
        modalInfo.classList.remove('opacity-100', 'translate-x-0');
        modalInfo.classList.add('opacity-0', 'translate-x-8');
        
        // Hide overlay after inner animations start hiding
        setTimeout(() => {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0', 'pointer-events-none');
        }, 300);
    });
});
