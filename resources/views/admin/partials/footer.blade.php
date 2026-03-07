    <!--end::App Main-->
    <!--begin::Footer-->

    <script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showAlert() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {

                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Blog has been deleted successfully.',
                        icon: 'success'
                    });
                }

            });
        }
    </script>

    {{-- cke editor script --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    {{-- image javascript --}}


    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let dropArea = document.getElementById("drop-area");
            let input = document.getElementById("images");
            let preview = document.getElementById("preview");

            let selectedFiles = [];

            dropArea.addEventListener("click", () => input.click());

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, e => e.preventDefault());
            });

            dropArea.addEventListener("drop", function(e) {
                handleFiles(e.dataTransfer.files);
            });

            input.addEventListener("change", function() {
                handleFiles(this.files);
            });

            function handleFiles(files) {

                Array.from(files).forEach(file => {
                    if (!file.type.startsWith("image/")) return;
                    selectedFiles.push(file);
                });

                showPreview();
            }

            function showPreview() {

                preview.innerHTML = "";

                selectedFiles.forEach((file, index) => {

                    let reader = new FileReader();

                    reader.onload = function(e) {

                        let col = document.createElement("div");
                        col.classList.add("col-md-3", "mb-3");

                        col.innerHTML = `
                    <div class="card shadow-sm position-relative">
                        <img src="${e.target.result}" 
                             class="card-img-top"
                             style="height:150px; object-fit:cover;">
                        <button type="button"
                                class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"
                                onclick="removeImage(${index})">
                            ✕
                        </button>
                    </div>
                `;

                        preview.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                });

                updateInputFiles();
            }

            function updateInputFiles() {
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }

            window.removeImage = function(index) {
                selectedFiles.splice(index, 1);
                showPreview();
            };

        });
    </script>



    <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">We are here to Guide.</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
            Copyright &copy; 2026&nbsp;
            <a href="https://adminlte.io" class="text-decoration-none">ABC Consultancy</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
    </footer>
    <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('all_collect/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

            // Disable OverlayScrollbars on mobile devices to prevent touch interference
            const isMobile = window.innerWidth <= 992;

            if (
                sidebarWrapper &&
                OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
                !isMobile
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::OverlayScrollbars Configure-->

    <!-- OPTIONAL SCRIPTS -->

    <!-- sortablejs -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" crossorigin="anonymous"></script> --}}

    <!-- sortablejs -->
    {{-- <script>
        new Sortable(document.querySelector('.connectedSortable'), {
            group: 'shared',
            handle: '.card-header',
        });

        const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
        cardHeaders.forEach((cardHeader) => {
            cardHeader.style.cursor = 'move';
        });
    </script> --}}

    <!-- apexcharts -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script> --}}

    <!-- ChartJS -->
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        //     const sales_chart_options = {
        //         series: [{
        //                 name: 'Digital Goods',
        //                 data: [28, 48, 40, 19, 86, 27, 90],
        //             },
        //             {
        //                 name: 'Electronics',
        //                 data: [65, 59, 80, 81, 56, 55, 40],
        //             },
        //         ],
        //         chart: {
        //             height: 300,
        //             type: 'area',
        //             toolbar: {
        //                 show: false,
        //             },
        //         },
        //         legend: {
        //             show: false,
        //         },
        //         colors: ['#0d6efd', '#20c997'],
        //         dataLabels: {
        //             enabled: false,
        //         },
        //         stroke: {
        //             curve: 'smooth',
        //         },
        //         xaxis: {
        //             type: 'datetime',
        //             categories: [
        //                 '2023-01-01',
        //                 '2023-02-01',
        //                 '2023-03-01',
        //                 '2023-04-01',
        //                 '2023-05-01',
        //                 '2023-06-01',
        //                 '2023-07-01',
        //             ],
        //         },
        //         tooltip: {
        //             x: {
        //                 format: 'MMMM yyyy',
        //             },
        //         },
        //     };

        //     const sales_chart = new ApexCharts(
        //         document.querySelector('#revenue-chart'),
        //         sales_chart_options,
        //     );
        //     sales_chart.render();
        // 
    </script>
    <script>
        (() => {
            "use strict";

            const storedTheme = localStorage.getItem("theme");

            const getPreferredTheme = () => {
                if (storedTheme) {
                    return storedTheme;
                }

                return window.matchMedia("(prefers-color-scheme: dark)").matches ?
                    "dark" :
                    "light";
            };

            const setTheme = function(theme) {
                if (
                    theme === "auto" &&
                    window.matchMedia("(prefers-color-scheme: dark)").matches
                ) {
                    document.documentElement.setAttribute("data-bs-theme", "dark");
                } else {
                    document.documentElement.setAttribute("data-bs-theme", theme);
                }
            };

            setTheme(getPreferredTheme());

            const showActiveTheme = (theme, focus = false) => {
                const themeSwitcher = document.querySelector("#bd-theme");

                if (!themeSwitcher) {
                    return;
                }

                const themeSwitcherText = document.querySelector("#bd-theme-text");
                const activeThemeIcon = document.querySelector(".theme-icon-active i");
                const btnToActive = document.querySelector(
                    `[data-bs-theme-value="${theme}"]`
                );
                const svgOfActiveBtn = btnToActive.querySelector("i").getAttribute("class");

                for (const element of document.querySelectorAll("[data-bs-theme-value]")) {
                    element.classList.remove("active");
                    element.setAttribute("aria-pressed", "false");
                }

                btnToActive.classList.add("active");
                btnToActive.setAttribute("aria-pressed", "true");
                activeThemeIcon.setAttribute("class", svgOfActiveBtn);
                const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
                themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

                if (focus) {
                    themeSwitcher.focus();
                }
            };

            window
                .matchMedia("(prefers-color-scheme: dark)")
                .addEventListener("change", () => {
                    if (storedTheme !== "light" || storedTheme !== "dark") {
                        setTheme(getPreferredTheme());
                    }
                });

            window.addEventListener("DOMContentLoaded", () => {
                showActiveTheme(getPreferredTheme());

                for (const toggle of document.querySelectorAll("[data-bs-theme-value]")) {
                    toggle.addEventListener("click", () => {
                        const theme = toggle.getAttribute("data-bs-theme-value");
                        localStorage.setItem("theme", theme);
                        setTheme(theme);
                        showActiveTheme(theme, true);
                    });
                }
            });
        })();
    </script>

    <!-- jsvectormap -->
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
        integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
        integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script>

    <!-- jsvectormap -->
    <script>
        // World map by jsVectorMap
        // new jsVectorMap({
        //     selector: '#world-map',
        //     map: 'world',
        // });

        // Sparkline charts
        // const option_sparkline1 = {
        //     series: [{
        //         data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
        //     }, ],
        //     chart: {
        //         type: 'area',
        //         height: 50,
        //         sparkline: {
        //             enabled: true,
        //         },
        //     },
        //     stroke: {
        //         curve: 'straight',
        //     },
        //     fill: {
        //         opacity: 0.3,
        //     },
        //     yaxis: {
        //         min: 0,
        //     },
        //     colors: ['#DCE6EC'],
        // };

        // const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
        // sparkline1.render();

        // const option_sparkline2 = {
        //     series: [{
        //         data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
        //     }, ],
        //     chart: {
        //         type: 'area',
        //         height: 50,
        //         sparkline: {
        //             enabled: true,
        //         },
        //     },
        //     stroke: {
        //         curve: 'straight',
        //     },
        //     fill: {
        //         opacity: 0.3,
        //     },
        //     yaxis: {
        //         min: 0,
        //     },
        //     colors: ['#DCE6EC'],
        // };

        // const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
        // sparkline2.render();

        // const option_sparkline3 = {
        //     series: [{
        //         data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
        //     }, ],
        //     chart: {
        //         type: 'area',
        //         height: 50,
        //         sparkline: {
        //             enabled: true,
        //         },
        //     },
        //     stroke: {
        //         curve: 'straight',
        //     },
        //     fill: {
        //         opacity: 0.3,
        //     },
        //     yaxis: {
        //         min: 0,
        //     },
        //     colors: ['#DCE6EC'],
        // };

        // const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
        // sparkline3.render();
    </script>
    <!--end::Script-->
