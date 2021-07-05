<div class="aqua-gradient shadow-md">
    <nav id="sidebar" class="active ">
        <h1><a href="index.php" class="logo">K.</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="index.php"><span class="fa fa-home"></span> Semua</a>
            </li>
            <?php
            foreach ($kategori->get_all() as $data) {
                $encry->word = $data['id_kategori'];
                $id_kategori = $encry->encr();
            ?>

                <li class="active">
                    <a href="?k=<?php echo $data['nama_kategori']; ?>&i=<?php echo $id_kategori; ?>"><span class="fa fa-home"></span> <?php echo $data['nama_kategori']; ?></a>
                </li>
            <?php
            }
            ?>

        </ul>
    </nav>
</div>