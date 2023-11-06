<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h3>Fiche Clients</h3>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
                
                <form class="form-inline my-2 my-lg-0">  
                    <button class="btn btn-primary me-md-2" type="button">Creer un client</button>
                </form>
            </div>
                <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom Prénom</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($clients as $client){
                        echo "<tr>";
                        echo "<th scope='row'>" . $client->getId(). "</th>";
                        echo "<td>" .$client->getPrenom() . " " . $client->getNom(). "</td>" ;
                        echo "<td>" .$client->getTelephone() ."</td>";
                        echo "<td>".$client->getEmail() ."</td>";
                    ?>
                        <td>
                            <a href="/client-card<?= $client->getId() ?>" class="btn btn-primary" target="_blank">Voir la fiche</a>
                        </td>
                    <?php

                    echo "</tr>";
                    
                 }
                 
                 
                 ?>

                 

                </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>