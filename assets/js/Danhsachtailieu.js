function loadExam(fileUrl, clickedElement) {
    const viewer = document.querySelector('iframe[name="viewer"]');
    viewer.src = fileUrl;

    document.querySelectorAll('.exam-item').forEach(item => {
        item.classList.remove('active');
    });

    clickedElement.classList.add('active');
}

window.onload = function () {
    const searchInput = document.getElementById('searchInput');
    const sections = document.querySelectorAll('.year-section');

    searchInput.addEventListener('input', function () {
    const keyword = searchInput.value.toLowerCase();

    document.querySelectorAll('.year-section').forEach(section => {
        let hasVisibleItem = false;

        section.querySelectorAll('.exam-item, .video-item').forEach(item => {
            const text = item.textContent.toLowerCase();
            if (text.includes(keyword)) {
                item.style.display = 'block';
                hasVisibleItem = true;
            } else {
                item.style.display = 'none';
            }
        });

        // Ẩn/hiện cả section nếu không có mục nào khớp
        section.style.display = hasVisibleItem ? 'block' : 'none';
    });
});


    const firstExam = document.querySelector('.exam-item');
    if (firstExam) firstExam.click();

    const resizer = document.getElementById('resizer');
    const sidebar = document.querySelector('.sidebar');
    let isResizing = false;

    resizer.addEventListener('mousedown', () => {
        isResizing = true;
        document.body.style.cursor = 'col-resize';
    });

    document.addEventListener('mousemove', (e) => {
        if (!isResizing) return;
        const newWidth = e.clientX;
        if (newWidth > 200 && newWidth < window.innerWidth - 200) {
            sidebar.style.width = `${newWidth}px`;
        }
    });

    document.addEventListener('mouseup', () => {
        isResizing = false;
        document.body.style.cursor = 'default';
    });
}