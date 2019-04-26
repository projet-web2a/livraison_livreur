<table class="table table-bordered table-hover table-dark ">
                            <thead >
                             <tr>
                              <th scope="col">ID Commande</th>
                              <th scope="col">Reference Produit</th>
                              <th scope="col">Marque Produit</th>
                              <th scope="col">Prix </th>
                              <th scope="col">Quantite</th>
                            </tr>
                          </thead>
                          <tbody>
                        <?php foreach($listeProduit as $Produit): ?>
                            <tr>
                              <td> <?= $idCommande ?> </td>
                              <td> <?= $Produit->refe; ?> </td>
                              <td> <?= $Produit->mar; ?> </td>
                              <td> <?= $Produit->prix; ?> </td>
                              <td> <?= $Produit->quantiteCommandee; ?> </td>
                          </tbody>
                                    <?php endforeach; ?>

</table>