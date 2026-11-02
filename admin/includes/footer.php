<?php
// admin/includes/footer.php
?>
			</div>
		</main>
		<footer class="mt-16" style="background: rgba(0, 0, 0, 0.95); border-top: 1px solid rgba(129, 140, 248, 0.3);">
			<div class="max-w-7xl mx-auto px-4 py-6 lg:px-8">
				<div class="flex flex-col gap-4 text-sm text-slate-300 md:flex-row md:items-center md:justify-between">
					<div>
						<p class="font-orbitron text-sm uppercase tracking-[0.2em]" style="color: #818cf8;">Consola activa</p>
						<p class="mt-1" style="color: rgba(255, 255, 255, 0.7);">Administrador Tienda Mística &bull; <?php echo date('Y'); ?></p>
					</div>
					<p style="color: rgba(255, 255, 255, 0.6);">Recordatorio: mantené las stats de los duendes calibradas para la próxima oleada arcade.</p>
				</div>
			</div>
		</footer>
	</div>
</div>

<style>
/* Admin Panel Styles - Igual que la página principal */
.admin-section-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid rgba(129, 140, 248, 0.2);
}

.admin-section-title {
    font-family: 'Orbitron', sans-serif;
    font-size: 1.875rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    background: linear-gradient(90deg, #818cf8, #ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.admin-section-subtitle {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.6);
    margin-top: 0.5rem;
}

/* Buttons */
.btn-arc {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 1.25rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    font-weight: 500;
    letter-spacing: 0.02em;
    text-decoration: none;
    border: 1px solid;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: transparent;
}

.btn-arc--primary {
    background: rgba(129, 140, 248, 0.2);
    border-color: rgba(129, 140, 248, 0.4);
    color: #818cf8;
}

.btn-arc--primary:hover {
    background: rgba(129, 140, 248, 0.3);
    border-color: rgba(129, 140, 248, 0.6);
    box-shadow: 0 0 20px rgba(129, 140, 248, 0.3);
    transform: translateY(-2px);
}

.btn-arc--secondary {
    background: rgba(0, 0, 0, 0.4);
    border-color: rgba(255, 255, 255, 0.2);
    color: rgba(255, 255, 255, 0.8);
}

.btn-arc--secondary:hover {
    background: rgba(59, 130, 246, 0.2);
    border-color: rgba(59, 130, 246, 0.4);
    color: #fff;
}

.btn-arc--danger {
    background: rgba(239, 68, 68, 0.2);
    border-color: rgba(239, 68, 68, 0.4);
    color: #ef4444;
}

.btn-arc--danger:hover {
    background: rgba(239, 68, 68, 0.3);
    border-color: rgba(239, 68, 68, 0.6);
    box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
}

/* Alerts */
.alert {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.25rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
    border: 1px solid;
    backdrop-filter: blur(10px);
}

.alert__icon {
    font-size: 1.25rem;
    font-weight: bold;
}

.alert-success {
    background: rgba(34, 197, 94, 0.15);
    border-color: rgba(34, 197, 94, 0.4);
    color: #22c55e;
}

.alert-error {
    background: rgba(239, 68, 68, 0.15);
    border-color: rgba(239, 68, 68, 0.4);
    color: #ef4444;
}

.alert-warning {
    background: rgba(251, 191, 36, 0.15);
    border-color: rgba(251, 191, 36, 0.4);
    color: #fbbf24;
}

/* Table Container */
.admin-table-container {
    background: rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(129, 140, 248, 0.3);
    border-radius: 12px;
    overflow: hidden;
    backdrop-filter: blur(10px);
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table thead {
    background: rgba(129, 140, 248, 0.1);
    border-bottom: 1px solid rgba(129, 140, 248, 0.3);
}

.admin-table thead th {
    padding: 1rem;
    text-align: left;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #818cf8;
}

.admin-table tbody tr {
    border-bottom: 1px solid rgba(129, 140, 248, 0.1);
    transition: all 0.2s ease;
}

.admin-table tbody tr:hover {
    background: rgba(129, 140, 248, 0.05);
}

.admin-table tbody td {
    padding: 0.75rem 1rem !important;
    vertical-align: middle !important;
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.875rem;
}

/* Admin Table Image */
.admin-table__image {
    width: 50px;
    height: 50px;
    border-radius: 6px;
    overflow: hidden;
    border: 1px solid rgba(129, 140, 248, 0.3);
    background: rgba(0, 0, 0, 0.4);
}

.admin-table__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.admin-table tbody tr:hover .admin-table__image img {
    transform: scale(1.15);
}

/* Form Container */
.admin-form-container {
    background: rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(129, 140, 248, 0.3);
    border-radius: 12px;
    padding: 2rem;
    backdrop-filter: blur(10px);
}

.admin-form-container label {
    display: block;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.875rem;
    font-weight: 600;
    color: #818cf8;
    margin-bottom: 0.5rem;
}

.admin-form-container input,
.admin-form-container textarea,
.admin-form-container select {
    width: 100%;
    padding: 0.75rem 1rem;
    background: rgba(0, 0, 0, 0.4);
    border: 1px solid rgba(129, 140, 248, 0.3);
    border-radius: 8px;
    color: #fff;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.admin-form-container input:focus,
.admin-form-container textarea:focus,
.admin-form-container input:focus,
.admin-form-container textarea:focus,
.admin-form-container select:focus {
    outline: none;
    border-color: rgba(129, 140, 248, 0.6);
    box-shadow: 0 0 15px rgba(129, 140, 248, 0.2);
}

/* Form Input Universal Styles */
.form-input, .form-textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    background: rgba(0, 0, 0, 0.4);
    border: 1px solid rgba(129, 140, 248, 0.3);
    border-radius: 8px;
    color: #fff;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    font-family: 'Inter', sans-serif;
}

.form-input:focus, .form-textarea:focus {
    outline: none;
    border-color: rgba(129, 140, 248, 0.6);
    box-shadow: 0 0 15px rgba(129, 140, 248, 0.2);
    background: rgba(0, 0, 0, 0.6);
}

.form-label {
    display: block;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.875rem;
    font-weight: 600;
    color: #818cf8;
    margin-bottom: 0.5rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

/* Admin Form Sections */
.admin-form {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.admin-form-section {
    background: rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(129, 140, 248, 0.3);
    border-radius: 12px;
    padding: 2rem;
    backdrop-filter: blur(10px);
}

.admin-form-section__title {
    font-family: 'Orbitron', sans-serif;
    font-size: 1.25rem;
    font-weight: 700;
    color: #818cf8;
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid rgba(129, 140, 248, 0.2);
}

.admin-form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.admin-form-grid--full {
    grid-column: 1 / -1;
}

.admin-form-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    padding-top: 1.5rem;
    border-top: 1px solid rgba(129, 140, 248, 0.2);
}

.btn-arc--lg {
    padding: 0.875rem 2rem;
    font-size: 1rem;
}

/* Admin Section Header */    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid rgba(129, 140, 248, 0.2);
}

.admin-section-title {
    font-family: 'Orbitron', sans-serif;
    font-size: 1.875rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    background: linear-gradient(90deg, #818cf8, #ec4899);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.admin-section-subtitle {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.6);
    margin-top: 0.5rem;
}

/* Buttons */
.btn-arc {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.625rem 1.25rem;
    font-family: 'Inter', sans-serif;
    font-size: 0.875rem;
    font-weight: 500;
    letter-spacing: 0.02em;
    text-decoration: none;
    border: 1px solid;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: transparent;
}

.btn-arc--primary {
    background: rgba(129, 140, 248, 0.2);
    border-color: rgba(129, 140, 248, 0.4);
    color: #818cf8;
}

.btn-arc--primary:hover {
    background: rgba(129, 140, 248, 0.3);
    border-color: rgba(129, 140, 248, 0.6);
    box-shadow: 0 0 20px rgba(129, 140, 248, 0.3);
    transform: translateY(-2px);
}

.btn-arc--secondary {
    background: rgba(0, 0, 0, 0.4);
    border-color: rgba(255, 255, 255, 0.2);
    color: rgba(255, 255, 255, 0.8);
}

.btn-arc--secondary:hover {
    background: rgba(59, 130, 246, 0.2);
    border-color: rgba(59, 130, 246, 0.4);
    color: #fff;
}

.btn-arc--danger {
    background: rgba(239, 68, 68, 0.2);
    border-color: rgba(239, 68, 68, 0.4);
    color: #ef4444;
}

.btn-arc--danger:hover {
    background: rgba(239, 68, 68, 0.3);
    border-color: rgba(239, 68, 68, 0.6);
    box-shadow: 0 0 20px rgba(239, 68, 68, 0.3);
}

/* Alerts */
.alert {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem 1.25rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    font-size: 0.875rem;
    border: 1px solid;
    backdrop-filter: blur(10px);
}

.alert__icon {
    font-size: 1.25rem;
    font-weight: bold;
}

.alert-success {
    background: rgba(34, 197, 94, 0.15);
    border-color: rgba(34, 197, 94, 0.4);
    color: #22c55e;
}

.alert-error {
    background: rgba(239, 68, 68, 0.15);
    border-color: rgba(239, 68, 68, 0.4);
    color: #ef4444;
}

.alert-warning {
    background: rgba(251, 191, 36, 0.15);
    border-color: rgba(251, 191, 36, 0.4);
    color: #fbbf24;
}

/* Table Container */
.admin-table-container {
    background: rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(129, 140, 248, 0.3);
    border-radius: 12px;
    overflow: hidden;
    backdrop-filter: blur(10px);
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
}

.admin-table thead {
    background: rgba(129, 140, 248, 0.1);
    border-bottom: 1px solid rgba(129, 140, 248, 0.3);
}

.admin-table thead th {
    padding: 1rem;
    text-align: left;
    font-family: 'Orbitron', sans-serif;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #818cf8;
}

.admin-table tbody tr {
    border-bottom: 1px solid rgba(129, 140, 248, 0.1);
    transition: all 0.2s ease;
}

.admin-table tbody tr:hover {
    background: rgba(129, 140, 248, 0.05);
}

.admin-table tbody td {
    padding: 0.75rem 1rem !important;
    vertical-align: middle !important;
    color: rgba(255, 255, 255, 0.8);
    font-size: 0.875rem;
}

/* Form Container */
.admin-form-container {
    background: rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(129, 140, 248, 0.3);
    border-radius: 12px;
    padding: 2rem;
    backdrop-filter: blur(10px);
}

/* Admin Action Links - Estilos mejorados */
.admin-table__actions {
    display: flex !important;
    gap: 0.75rem !important;
    align-items: center !important;
    justify-content: flex-end !important;
    padding: 0.75rem 1rem !important;
}

.admin-action-link {
    font-family: 'Inter', sans-serif !important;
    font-size: 0.875rem !important;
    font-weight: 500 !important;
    text-decoration: none !important;
    transition: all 0.2s ease !important;
    padding: 0.5rem 1rem !important;
    border-radius: 0.5rem !important;
    border: 1px solid !important;
    background: none !important;
    cursor: pointer !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 0.375rem !important;
    white-space: nowrap !important;
    height: 38px !important;
}

.admin-action-link--edit {
    color: #818CF8 !important;
    border-color: rgba(129, 140, 248, 0.3) !important;
    background: rgba(129, 140, 248, 0.05) !important;
}

.admin-action-link--edit:hover {
    color: #FBB024 !important;
    background: rgba(251, 176, 36, 0.15) !important;
    border-color: rgba(251, 176, 36, 0.4) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(251, 176, 36, 0.2) !important;
}

.admin-action-link--delete {
    color: #EC4899 !important;
    border-color: rgba(236, 72, 153, 0.3) !important;
    background: rgba(236, 72, 153, 0.05) !important;
}

.admin-action-link--delete:hover {
    color: #EF4444 !important;
    background: rgba(239, 68, 68, 0.15) !important;
    border-color: rgba(239, 68, 68, 0.4) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2) !important;
}

.admin-action-link--activate {
    color: #10b981 !important;
    border-color: rgba(16, 185, 129, 0.3) !important;
    background: rgba(16, 185, 129, 0.05) !important;
}

.admin-action-link--activate:hover {
    color: #22c55e !important;
    background: rgba(34, 197, 94, 0.15) !important;
    border-color: rgba(34, 197, 94, 0.4) !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 12px rgba(34, 197, 94, 0.2) !important;
}

/* Asegurar altura consistente en todas las celdas de tabla */
.admin-table tbody td {
    padding: 0.75rem 1rem !important;
    vertical-align: middle !important;
}
</style>

<!-- Toast Container -->
<div id="toast-container" style="position: fixed; top: 80px; right: 20px; z-index: 10000; display: flex; flex-direction: column; gap: 12px; max-width: 400px;"></div>

<!-- Confirm Modal -->
<div id="confirm-modal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.8); z-index: 10001; align-items: center; justify-content: center;">
    <div style="background: linear-gradient(135deg, #090e20 0%, #0d1428 100%); padding: 32px; border-radius: 16px; border: 1px solid rgba(129, 140, 248, 0.3); box-shadow: 0 0 40px rgba(59, 130, 246, 0.3); max-width: 480px; width: 90%;">
        <div style="text-align: center; margin-bottom: 24px;">
            <div style="font-size: 48px; margin-bottom: 16px;">⚠️</div>
            <h3 id="confirm-title" style="font-family: 'Orbitron', sans-serif; color: #fff; font-size: 20px; margin-bottom: 12px;"></h3>
            <p id="confirm-message" style="color: #94a3b8; font-size: 14px; line-height: 1.6; white-space: pre-line;"></p>
        </div>
        <div style="display: flex; gap: 12px; justify-content: center;">
            <button id="confirm-cancel" class="btn-arc btn-arc--secondary" style="min-width: 120px;">Cancelar</button>
            <button id="confirm-accept" class="btn-arc btn-arc--danger" style="min-width: 120px;">Aceptar</button>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script>
// Toast System
function showToast(message, type = 'info', duration = 3000) {
    const container = document.getElementById('toast-container');
    const toast = document.createElement('div');
    
    const colors = {
        success: { bg: 'rgba(34, 197, 94, 0.15)', border: '#22c55e', icon: '✓' },
        error: { bg: 'rgba(239, 68, 68, 0.15)', border: '#ef4444', icon: '✕' },
        warning: { bg: 'rgba(251, 191, 36, 0.15)', border: '#fbbf24', icon: '⚠' },
        info: { bg: 'rgba(59, 130, 246, 0.15)', border: '#3b82f6', icon: 'ℹ' }
    };
    
    const config = colors[type] || colors.info;
    
    toast.innerHTML = `
        <div style="background: ${config.bg}; backdrop-filter: blur(10px); border: 1px solid ${config.border}; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.3); min-width: 300px;">
            <span style="color: ${config.border}; font-size: 20px; font-weight: bold;">${config.icon}</span>
            <p style="color: #fff; margin: 0; flex: 1; font-size: 14px;">${message}</p>
            <button onclick="this.parentElement.parentElement.remove()" style="background: none; border: none; color: #94a3b8; cursor: pointer; font-size: 20px; padding: 0; line-height: 1;">×</button>
        </div>
    `;
    
    container.appendChild(toast);
    
    if (typeof gsap !== 'undefined') {
        gsap.from(toast, { x: 400, opacity: 0, duration: 0.4, ease: 'back.out(1.7)' });
    }
    
    if (duration > 0) {
        setTimeout(() => {
            if (typeof gsap !== 'undefined') {
                gsap.to(toast, {
                    x: 400,
                    opacity: 0,
                    duration: 0.3,
                    onComplete: () => toast.remove()
                });
            } else {
                toast.remove();
            }
        }, duration);
    }
}

// Confirm Dialog System
function showConfirm(message, title = '¿Estás seguro?') {
    return new Promise((resolve) => {
        const modal = document.getElementById('confirm-modal');
        const titleEl = document.getElementById('confirm-title');
        const messageEl = document.getElementById('confirm-message');
        const acceptBtn = document.getElementById('confirm-accept');
        const cancelBtn = document.getElementById('confirm-cancel');
        
        titleEl.textContent = title;
        messageEl.textContent = message;
        modal.style.display = 'flex';
        
        if (typeof gsap !== 'undefined') {
            gsap.fromTo(modal, { opacity: 0 }, { opacity: 1, duration: 0.2 });
            gsap.fromTo(modal.querySelector('div > div'), { scale: 0.9, y: 20 }, { scale: 1, y: 0, duration: 0.3, ease: 'back.out(1.7)' });
        }
        
        const close = (result) => {
            if (typeof gsap !== 'undefined') {
                gsap.to(modal, {
                    opacity: 0,
                    duration: 0.2,
                    onComplete: () => {
                        modal.style.display = 'none';
                        resolve(result);
                    }
                });
            } else {
                modal.style.display = 'none';
                resolve(result);
            }
        };
        
        acceptBtn.onclick = () => close(true);
        cancelBtn.onclick = () => close(false);
        
        const escHandler = (e) => {
            if (e.key === 'Escape') {
                close(false);
                document.removeEventListener('keydown', escHandler);
            }
        };
        document.addEventListener('keydown', escHandler);
    });
}
</script>

</body>
</html>
