<?php
    require_once('nav.php');
?>
<main class="py-5">
     <section id="listado" class="mb-5">
          <div class="container">
               <h2 class="mb-4">Agregar cerveza</h2>
               <form class="bg-light-alpha p-5" method="post" action="<?php echo FRONT_ROOT ?>Beer/AddForm">
                    <div class="row">                         
                         <div class="col-lg-3">
                              <div class="form-group">
                                   <label for="">Tipo</label>
                                      <select class="form-control" name="idType">
                                          <?php foreach($this->beerTypeList as $beerType) { ?>
                                               <option  value="<?php echo $beerType->getBeerTypeId();?>" > <?php echo $beerType->getDescription(); ?></option>
                                            <?php } ?>
                                      </select>
                              </div>
                         </div>
                         <div class="col-lg-5">
                              <div class="form-group">
                                   <label for="">Nombre</label>
                                   <input type="text" name="name" class="form-control">
                              </div>
                         </div>                         
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">IBU</label>
                                   <input type="number" name="IBU" class="form-control">
                              </div>
                         </div>
                         <div class="col-lg-2">
                              <div class="form-group">
                                   <label for="">Precio</label>
                                   <input type="number" name="price" class="form-control">
                              </div>
                         </div>
                    </div>
                    <button type="submit"  class="btn btn-dark ml-auto d-block">Agregar</button>
               </form>
          </div>
     </section>
</main>