<?php
require_once('nav.php');
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">
            <h2 class="mb-4">Listado de cervezas</h2>
            <table class="table bg-light-alpha">
                <thead>
                <th>#</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>IBU</th>
                <th>Precio</th>
                </thead>
                <tbody>
                <?php foreach ($beerList as $beer) { ?>
                <?php $description = $this->beerTypeDAO->GetByBeerTypeId($beer->getBeerTypeId());
                                        $description = $description->getDescription(); ?>
                <tr>
                    <td><?php echo $beer->getBeerId(); ?></td>
                    <td><?php echo $description ?></td>
                    <td><?php echo $beer->getName(); ?></td>
                    <td><?php echo $beer->getIBU(); ?></td>
                    <td><?php echo $beer->getPrice(); ?></td>
                </tr>
                <tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</main>