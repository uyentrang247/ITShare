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

            function filterSections() {
                const keyword = searchInput.value.toLowerCase();

                const sections = document.querySelectorAll('.year-section');

                sections.forEach(section => {
                    const text = section.textContent.toLowerCase();
                    const matchesKeyword = text.includes(keyword);
                    section.style.display = matchesKeyword ? 'block' : 'none';
                });
            }

            searchInput.addEventListener('input', filterSections);

            const firstExam = document.querySelector('.exam-item');
            if (firstExam) {
                firstExam.click();
            }

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