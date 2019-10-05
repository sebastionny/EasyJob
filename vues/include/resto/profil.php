                <div class="row justify-content-center" >
                     <!-- Section mon Resto -->

                     <div class=" shadow-lg p-3 mb-5 bg-white rounded col-sm-12 col-lg-10">
                         <h2 class="font2 fontGrande2 fontCenter space30 col-12 color2" ">Mon Restaurant</h2>
                         <div class="container">

                            <div class=" justify-content-center">
                                <div class="col-md-10 offset-md-1 font2">

                                    <?php (new LoginAction)->makeJson() ?>
                                    <form>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Nom du restaurant</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" placeholder="Ex: tacos Amelia" id="idNomRest">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Adresse</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" id="idAdresse" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Province</label>
                                                <div class="col-md-7">
                                                <select id="idProvince" class="form-control">
                                                    <option value="quebec">Québec</option>
                                                    <option value="ontario" >Ontario</option>
                                                    <option value="default">...</option>
                                                </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Ville</label>
                                                <div class="col-md-7">
                                                <select id="idVille" class="form-control">
                                                    <option value="montreal">Montréal</option>
                                                    <option value="laval">Laval</option>
                                                    <option value="longueil">longueil</option>
                                                    <option value="default">...</option>
                                                </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Code postal</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" id="idCodePostal">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Télephone du resto</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" id="idTelRest">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Description</label>
                                                <div class="col-md-7">
                                                <textarea class="form-control"  rows="5" id="idDescription"></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <button type="submit" class="nav-link btn btn-primary ">SAUVEGARDER</button>
                                                </div>
                                            </div>
                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Section mon Resto FIN -->

                    <!-- Section mon compte -->
                    <div class=" shadow-lg p-3 mb-5 bg-white rounded col-sm-12 col-lg-10">
                         <h2 class="font2 fontGrande2 fontCenter space30 col-12 color2">Mon Compte</h2>
                         <div class="container">

                            <div class=" justify-content-center">
                                <div class="col-md-10 offset-md-1 font2">

                                    <form>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Nom</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" id="idNom" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Prénom</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" id="idPrenom" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Courriel</label>
                                                <div class="col-md-7">
                                                    <input type="email" class="form-control" id="idCourriel" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Mot de passe</label>
                                                <div class="col-md-7">
                                                <input type="password" class="form-control" id="idMotDePasse" >
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label">Télephone</label>
                                                <div class="col-md-7">
                                                <input type="text" class="form-control" id="idTelPer"></div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-md-5 col-form-label"></label>
                                                <div class="col-md-7">
                                                    <button type="submit" class="nav-link btn btn-primary ">SAUVEGARDER</button>
                                                </div>
                                            </div>

                                           

                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- section mon compte FIN -->

                    <script type="text/javascript">
                        function info(){
                            fetch('js/user/compte.json')
                                .then(reponse => {
                                    return reponse.json()
                                })
                                .then(data => {
                                    document.getElementById('idNomRest').value = data[0].nomReto;
                                    document.getElementById('idAdresse').value = data[0].adresse;
                                    document.getElementById('idProvince').value = data[0].province;
                                    document.getElementById('idVille').value = data[0].ville;
                                    document.getElementById('idCodePostal').value = data[0].codePostal;
                                    document.getElementById('idTelRest').value = data[0].tel;
                                    document.getElementById('idDescription').value = data[0].description;

                                    document.getElementById('idNom').value = data[1].nom;
                                    document.getElementById('idPrenom').value = data[1].prenom;
                                    document.getElementById('idCourriel').value = data[1].courriel;
                                    document.getElementById('idMotDePasse').value = data[1].motDePasse;
                                    document.getElementById('idTelPer').value = data[1].telCompte;

                                })
                                .catch(err =>{
                                    alert("Erreur avec le fichie .json " + err);
                                })
                        }
                        window.onloadstart = info();

                    </script>


                </div>