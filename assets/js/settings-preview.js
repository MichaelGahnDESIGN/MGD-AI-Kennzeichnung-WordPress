/**
 * Aktualisiert die lokale Verwaltungs-Vorschau ohne Speichern und ohne Anfrage.
 *
 * Der Text wird ausschließlich mit textContent gesetzt. Damit bleiben die
 * redaktionellen Auswahlwerte auch im Administrationsbereich kein HTML-Kontext.
 */
(function () {
	'use strict';

	function initialisePreview() {
		const preview = document.querySelector('[data-mgd-ail-settings-preview]');
		const form = document.querySelector('[data-mgd-ail-settings-form]');

		if (!preview || !form) {
			return;
		}

		const badge = preview.querySelector('.mgd-ail-badge');
		const text = preview.querySelector('.mgd-ail-badge__text');
		const language = form.querySelector('[name="mgd_ail_display_options[language]"]');
		const autoLanguage = preview.dataset.autoLanguage || 'de';

		if (!badge || !text || !language) {
			return;
		}

		const labels = {
			de: preview.dataset.labelDe || 'MIT KI ERSTELLT',
			en: preview.dataset.labelEn || 'AI GENERATED'
		};

		function value(name, fallback) {
			const input = form.querySelector('[name="mgd_ail_display_options[' + name + ']"]');
			return input && input.value ? input.value : fallback;
		}

		function update() {
			const selectedLanguage = language.value === 'auto' ? autoLanguage : language.value;
			const selectedPosition = value('position', 'bottom-right');
			const selectedTheme = value('theme', 'auto');

			text.textContent = labels[selectedLanguage] || labels.en;
			badge.className = 'mgd-ail-badge mgd-ail-status-generated mgd-ail-position-' + selectedPosition + ' mgd-ail-theme-' + selectedTheme;
			preview.style.setProperty('--mgd-ail-font-size', value('font_size', '6') + 'px');
			preview.style.setProperty('--mgd-ail-offset', value('offset', '12') + 'px');
			preview.style.setProperty('--mgd-ail-padding-y', value('padding_y', '5') + 'px');
			preview.style.setProperty('--mgd-ail-padding-x', value('padding_x', '9') + 'px');
			preview.style.setProperty('--mgd-ail-radius', value('radius', '999') + 'px');
			preview.style.setProperty('--mgd-ail-blur', value('blur', '10') + 'px');
		}

		form.addEventListener('input', update);
		form.addEventListener('change', update);
		update();
	}

	if ('loading' === document.readyState) {
		document.addEventListener('DOMContentLoaded', initialisePreview);
	} else {
		initialisePreview();
	}
}());
