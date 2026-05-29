<?php



?>
                <?php if(isset($page_title) && $page_title =='userlist' || $page_title =='blogs'): ?>
                <!-- Pagination Area -->
                <div class="p-3  d-flex justify-content-center pagina ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination mb-0">
                            <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
                            <li class="page-item" <?= $page <= 1 ?"disabled":"" ?>><a class="page-link" href="<?= $page <=1 ? "#":"?page=" . ($page-1) ?>">
                                Prev
                            </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href=""><?= $page ?></a></li>
                            <li class="page-item" <?= $page >= $total_page ? "disabled":"" ?>>
                                <a class="page-link" href="<?= $page >= $total_page ? "#":"?page=" . ($page+1) ?>">Next</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="?page=<?= $total_page ?>">Last</a></li>
                        </ul>
                    </nav>
                </div>
                <?php endif; ?>
            </div> <!-- /col-10 End -->
        </div> <!-- /row End -->
    </div> <!-- /container-fluid End -->
    <script src="/Blog/public/assets/js/script.js"></script>
</body>
</html>