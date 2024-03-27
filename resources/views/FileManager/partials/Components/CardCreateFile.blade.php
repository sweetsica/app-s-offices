<div class="card filemanager-sidebar me-md-3" style="height: 100vh">
    <div class="card-body">
        <div class="d-flex flex-column h-100">
            <div class="mb-4">
                <div class="mb-3">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-plus me-1"></i> Create New
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreateFolder"><i
                                    class="bx bx-folder me-1"></i>
                                Folder</button>
                            {{-- <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCreateFile"><i
                                    class="bx bx-file me-1"></i> File</button> --}}
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalUploadFile"><i
                                    class="bx bx-upload me-1"></i> Upload</button>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled categories-list">
                    <li>
                        <div class="custom-accordion">
                            <a class="text-body fw-medium py-1 d-flex align-items-center" data-bs-toggle="collapse"
                                href="#categories-collapse" role="button" aria-expanded="false"
                                aria-controls="categories-collapse">
                                <i class="mdi mdi-folder font-size-20 text-warning me-2"></i> My Files <i
                                    class="mdi mdi-chevron-up accor-down-icon ms-auto"></i>
                            </a>
                            <div class="collapse show" id="categories-collapse">
                                <div class="card border-0 shadow-none ps-2 mb-0">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#" class="d-flex align-items-center"><span
                                                    class="me-auto">Analytics</span></a></li>
                                        <li><a href="#" class="d-flex align-items-center"><span
                                                    class="me-auto">Design</span></a></li>
                                        <li><a href="#" class="d-flex align-items-center"><span
                                                    class="me-auto">Development</span> <i
                                                    class="mdi mdi-pin ms-auto"></i></a></li>
                                        <li><a href="#" class="d-flex align-items-center"><span
                                                    class="me-auto">Project A</span></a></li>
                                        <li><a href="#" class="d-flex align-items-center"><span
                                                    class="me-auto">Admin</span> <i class="mdi mdi-pin ms-auto"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
