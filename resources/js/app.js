//import './bootstrap'; // Базовый файл конфигурации Laravel (не путать с самим Bootstrap)
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

// Пример инициализации всех подсказок (tooltips) на странице
import { Tooltip } from 'bootstrap';
document.querySelectorAll('[data-bs-toggle="tooltip"]')
    .forEach(tooltip => new Tooltip(tooltip));
