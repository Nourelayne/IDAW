<article>
    <div class="container">
        <form onsubmit="onFormSubmit()" method="POST">
            <div class="form-row">
                <div class="col-md-4">
                    <label>Nom Aliment</label>
                    <select class="form-control" id="nom" name="nom" required>
                        <option value="">--Please choose an Aliment--</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label>Quantité en Kilogramme</label>
                    <input type="text" class="form-control" name="quantite" id="quantite">
                </div>
                <div class="col-md-4">
                    <label>Date</label>
                    <input type="text" class="form-control" name="date" id="date">
                </div>
            </div>
            <button class="btn btn-success" type="submit" id="submitButtonJournal">Submit</button>
        </form>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><b>Journal du Mois de Mars</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="table-content">
                <thead>
                    <tr>
                        <th>Nom Aliment</th>
                        <th>Quantité en Kilogramme</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <script src="js/journal.js"></script>
</article>