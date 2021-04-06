<article>
    <form onsubmit="onFormSubmit()" method="POST" >
        <div class="form-row">
            <div class="col-md-4">
                <label>Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="col-md-4">
                <label>Energie (kJ/100 g)</label>
                <input type="text" class="form-control" name="energie" id="energie">
            </div>
            <div class="col-md-4">
                <label>Protéines (g/100 g)</label>
                <input type="text" class="form-control" name="protéines" id="protéines">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <label>Glucides (g/100 g)</label>
                <input type="text" class="form-control" name="glucides" id="glucides">
            </div>
            <div class="col-md-4">
                <label>Lipides (g/100 g)</label>
                <input type="text" class="form-control" name="lipides" id="lipides">
            </div>
            <div class="col-md-4">
                <label>Sucres (g/100 g)</label>
                <input type="text" class="form-control" name="sucres" id="sucres">
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-4">
                <label>Alcool (g/100 g)</label>
                <input type="text" class="form-control" name="alcool" id="alcool">
            </div>
            <div class="col-md-4">
                <label>Sodium (mg/100 g)</label>
                <input type="text" class="form-control" name="sodium" id="sodium">
            </div>
            <div class="col-md-4">
                <label>Eau (g/100 g)</label>
                <input type="text" class="form-control" name="eau" id="eau">
            </div>
        </div>
        <button class="btn btn-success" type="submit" id="submitButtonAliment">Submit</button>
    </form>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Gestion d'Aliments</b></h2>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover" id="table-content">
            <thead>
                <tr>
                    <th>Nom Aliment</th>
                    <th>Energie (kJ/100 g)</th>
                    <th>Protéines (g/100 g)</th>
                    <th>Glucides (g/100 g)</th>
                    <th>Lipides (g/100 g)</th>
                    <th>Sucres (g/100 g)</th>
                    <th>Alcool (g/100 g)</th>
                    <th>Sodium (mg/100 g)</th>
                    <th>Eau (g/100 g)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="js/aliments.js"></script>
</article>