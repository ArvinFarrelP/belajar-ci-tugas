<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == '') ? "" : "collapsed" ?>" href="/">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li><!-- End Home Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'keranjang') ? "" : "collapsed" ?>" href="keranjang">
                <i class="bi bi-cart-check"></i>
                <span>Keranjang</span>
            </a>
        </li><!-- End Keranjang Nav -->
        <?php
        if (session()->get('role') == 'admin') {
        ?>
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'produk') ? "" : "collapsed" ?>" href="produk">
                <i class="bi bi-receipt"></i>
                <span>Produk</span>
            </a>
        </li><!-- End Produk Nav -->
        <?php
        }
        ?>

        <?php
        if (session()->get('role') == 'admin') {
        ?>
        <li class="nav-item">
            <a class="nav-link <?php echo (uri_string() == 'kategori') ? "" : "collapsed" ?>" href="kategori">
                <i class="bi bi-receipt"></i>
                <span>Kategori Produk</span>
            </a>
        </li><!-- End Category Nav -->
        <?php
        }
        ?>

    </ul>

</aside><!-- End Sidebar-->