<?php
require CLIENT . '/View/Navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
.model {
    background-color: rgba(0, 0, 0, 0.2);
}

.form-group.col-md-6 {
    /* margin: 0 8px; */
    margin-right: 6px;
}

.p-6 {
    padding: 24px;
}

.form-row {
    display: flex;
    margin-top: 8px;
}

#js-input-search:focus {
    outline: none;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);
}
</style>

<body>
    <div class="container-fluid">
        <?php
        echo Navbar();
        ?>
        <main class="mt-3 w-100">
            <input type="search" name="" id="js-input-search" placeholder="Filter" class="rounded-2 outline-none p-2" />
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <h3 class="text-center text-primary">DANH SÁCH NHÂN VIÊN</h3>
                        <?php include_once CLIENT . "/NoticeAuthentication/GetError.php" ?>
                        <button type="button" id="js-add-employee" class="btn btn-primary">Thêm mới</button>
                        <table class="table w-100 mw-100" id="js-employee-table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã nhân viên</th>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Vị trí</th>
                                    <th scope="col">Phòng ban</th>
                                    <th scope="col" colspan="4" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="js-pagination">
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <h3 class="text-center text-primary text-uppercase">Danh sách phòng ban</h3>
                        <button type="button" id="js-add-department" class="btn btn-primary">Thêm mới</button>
                        <table class="table w-100 mw-100" id="js-department-table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã Phòng ban</th>
                                    <th scope="col">Tên phòng ban</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Phòng ban trực thuộc</th>
                                    <th scope="col" colspan="4" class="text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination" id="js-department-pagination">
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="js-employee-modal" class="fixed-top fixed-bottom model d-flex justify-content-center d-none
            align-items-center">
                <div class="bg-white rounded-3 p-6 w-50 h-50">
                    <form class="w-100"
                        action="<?= BASE_URL . 'server/controller/admin.controller.php?action=insertEmployee' ?>"
                        method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập họ và tên">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="position">Vị trí</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    placeholder="Nhập vị trí">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department">Phòng ban</label>
                                <select type="text" class="form-control" id="department" name="department"
                                    placeholder="Nhập phòng ban" class="form-select">
                                    <option value="0">--Chọn phòng ban--</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="button" class="btn btn-secondary" id="js-close-employee-modal">Đóng</button>
                    </form>


                </div>
            </div>
            <!-- Department Modal -->
            <div id="js-department-modal" class="fixed-top fixed-bottom model d-flex justify-content-center d-none
            align-items-center">
                <div class="bg-white rounded-3 p-6 w-50 h-50">
                    <form class="w-100"
                        action="<?= BASE_URL . 'server/controller/admin.controller.php?action=insertDepartment' ?>"
                        method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Tên phòng ban</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập tên phòng ban">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    placeholder="Website của bộ phận">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="department">Phòng ban trực thuộc</label>
                                <select type="text" class="form-control " id="parent-department" name="department"
                                    placeholder="Nhập phòng ban" class="form-select">
                                    <option value="0">--Chọn phòng ban trực thuộc--</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                        <button type="button" class="btn btn-secondary" id="js-close-department-modal">Đóng</button>
                    </form>
                </div>
            </div>
            <div id="js-delete-modal"
                class="fixed-top fixed-bottom model d-flex justify-content-center d-none align-items-center">
                <div class="container py-3 bg-white rounded-3 shadow-2">
                    <div class="alert alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Thông báo</h4>
                        <p id="modal-title">Bạn có muốn xóa không?</p>
                        <hr />
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-outline-danger modal-confirm ,me-3">Xóa</button>
                            <button type="button"
                                class="btn btn-sm btn-outline-primary modal-cancel margin-left-3">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>

        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    const forbidden = ["Avatar", "Logo", "ParentDepartmentID"];

    function pagination(startIndex, pageSize, data, table, keyField, actions) {
        // alert("here")
        let html = "";
        const endIndex = Math.min(startIndex + pageSize, data.length);
        for (let i = startIndex; i < endIndex; i++) {
            const item = data[i];
            html += `<tr> 
                    <th scope="row">${i + 1}</th>`
            Object.keys(item).forEach(
                key => {
                    if (!forbidden.includes(key))
                        html += `<td>${item[key]}</td>`
                }
            )
            html += `
                <td><a href=<?= BASE_URL ?>?controller=Pages&action=${actions.edit}&id=${item[keyField]}><i class="fa-solid fa-eye fs-5 d-flex justify-content-center"></i></a></td>
                <td id='js-delete-${actions.delete}-${item[keyField]}' data-id=${item[keyField]} data-name=${actions.delete}><i class="fa-solid fa-trash fs-5 d-flex justify-content-center "></i></td>
                </tr>`;
        }
        table.innerHTML = html;
    }
    </script>
    <script id="fetch-users">
    function updateEmployeeTable(data) {
        const employeeTable = document.querySelector('#js-employee-table tbody');
        pagination(0, 5, data, employeeTable, "EmployeeID", {
            edit: "UserInformation",
            delete: "deleteEmployee"
        });
        let pageSize = 5;
        let currentPage = 1;
        let totalPage = Math.ceil(data.length / pageSize);
        let startIndex = (currentPage - 1) * pageSize;
        let paginationHtml = "";
        for (let i = 0; i < totalPage; i++) {
            paginationHtml +=
                `<li class="page-item" data-page="${i}" data-pagesize="${pageSize}"><a class="page-link" href="#">${i + 1}</a></li>`;
        }
        const paginationElement = document.querySelector('#js-pagination');
        paginationElement.innerHTML = paginationHtml;
        // event click button phân trang
        paginationElement.querySelectorAll('.page-item').forEach(item => item.addEventListener('click',
            function(e) {
                e.preventDefault();
                const page = +this.getAttribute('data-page');
                // alert("pagination " + page);
                const pageSize = parseInt(this.getAttribute('data-pagesize'), 10);
                const employeeTable = document.querySelector('#js-employee-table tbody');
                pagination(page * pageSize, pageSize, data, employeeTable,
                    "EmployeeID", {
                        edit: "UserInformation",
                        delete: "deleteEmployee"
                    });
            }));
        assignDeleteHandler("deleteEmployee");
    }

    function fetchEmployees() {
        fetch("<?= BASE_URL ?>" + 'server/controller/admin.controller.php?action=getAllUsers').then(res => res.json())
            .then(data => {
                console.log(data);
                updateEmployeeTable(data);
            })
            .catch(console.log)
    }
    fetchEmployees();
    </script>
    <script id="fetch-departments">
    function updateDepartmentTable(data) {
        const departmentTable = document.querySelector('#js-department-table tbody');
        pagination(0, 5, data, departmentTable, "DepartmentID", {
            edit: "DepartmentInformation",
            delete: "deleteDepartment"
        });
        let pageSize = 5;
        let currentPage = 1;
        let totalPage = Math.ceil(data.length / pageSize);
        let startIndex = (currentPage - 1) * pageSize;
        let paginationHtml = "";
        for (let i = 0; i < totalPage; i++) {
            paginationHtml +=
                `<li class="page-item" data-page="${i}" data-pagesize="${pageSize}"><a class="page-link" href="#">${i + 1}</a></li>`;
        }
        const paginationElement = document.querySelector('#js-department-pagination');
        paginationElement.innerHTML = paginationHtml;
        // event click button phân trang

        paginationElement.querySelectorAll('.page-item').forEach(item => item.addEventListener('click',
            function() {
                const page = +this.getAttribute('data-page');
                const pageSize = parseInt(this.getAttribute('data-pagesize'));
                const departmentTable = document.querySelector('#js-department-table tbody');
                pagination(page * pageSize, pageSize, data,
                    departmentTable,
                    "DepartmentID", {
                        edit: "DepartmentInformation",
                        delete: "deleteDepartment"
                    });
            }));
    }

    function fetchDepartments() {
        fetch("<?= BASE_URL ?>" + 'server/controller/admin.controller.php?action=getAllDepartments').then(res => res
                .json())
            .then(data => {
                console.log(data);
                const departmentSelect = document.querySelector('#department');
                const parentDepartmentSelect = document.querySelector('#parent-department');
                data.forEach(item => {
                    departmentSelect.innerHTML +=
                        `<option value="${item.DepartmentID}">${item.DepartmentName}</option>`;
                    parentDepartmentSelect.innerHTML +=
                        `<option value="${item.DepartmentID}">${item.DepartmentName}</option>`
                })
                updateDepartmentTable(data);
                assignDeleteHandler("deleteDepartment");
            })
            .catch(console.log)
    }
    fetchDepartments();
    </script>
    <script>
    const toggleModal = (modal) => {
        modal.classList.toggle("d-none");
    }

    document.getElementById('js-add-employee').addEventListener('click', function() {
        const modal = document.getElementById('js-employee-modal');
        toggleModal(modal);
    });
    document.getElementById('js-close-employee-modal').addEventListener('click', function() {
        const modal = document.getElementById('js-employee-modal');
        if (modal) {
            toggleModal(modal);
        }
    });
    document.getElementById('js-add-department').addEventListener('click', function() {
        const modal = document.getElementById('js-department-modal');
        toggleModal(modal);
    })
    document.getElementById('js-close-department-modal').addEventListener('click', function() {
        const modal = document.getElementById('js-department-modal');
        if (modal) {
            toggleModal(modal);
        }
    })
    document.getElementById("js-input-search").addEventListener("keyup", e => {
        const keyword = e.target.value;
        if (keyword) {
            fetch("<?= BASE_URL ?>" + 'server/controller/search.controller.php?item=' + keyword)
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    const {
                        employees,
                        departments
                    } = data;
                    updateEmployeeTable(employees);
                    updateDepartmentTable(departments);
                })
        } else {
            fetchEmployees();
            fetchDepartments();
        }
    })
    document.getElementById("js-input-search").addEventListener("change", e => {
        const keyword = e.target.value;
        if (keyword) {
            fetch("<?= BASE_URL ?>" + 'server/controller/search.controller.php?item=' + keyword)
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    const {
                        employees,
                        departments
                    } = data;
                    updateEmployeeTable(employees);
                    updateDepartmentTable(departments);
                })
        } else {
            fetchEmployees();
            fetchDepartments();
        }
    })

    function assignDeleteHandler(action) {
        const deleteButtons = document.querySelectorAll(`td[id*=js-delete-${action}]`);
        deleteButtons.forEach(
            item => item.addEventListener('click', function() {
                // alert("clicked");
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const table = name == "deleteEmployee" ? "Nhân viên" : "Bộ phận";
                const modal = document.getElementById("js-delete-modal");
                const title = document.getElementById("modal-title");
                console.log(modal);
                title.innerText = `Bạn có đồng ý xóa ${table} ${id}`;
                const confirmButton = modal.getElementsByClassName("modal-confirm")[0];
                confirmButton.onclick = () => {
                    window.location.href =
                        `<?= BASE_URL ?>server/controller/admin.controller.php?action=${name}&id=${id}`;
                }
                console.log(modal.getElementsByClassName("modal-cancel")[0]);
                modal.getElementsByClassName("modal-cancel")[0].onclick = () => {
                    toggleModal(modal);
                };
                toggleModal(modal);
            })
        )
    }
    </script>

</html>