<form method="POST" name="frm_cajero" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="small-12">
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Archivo:</label>
                </div>
                <div class="small-5 columns">
                    <?=$form->archivo?>
                </div>
                <div class="small-1 columns left">
                    <input type="submit" value="Subir" class="button tiny"/>
                </div>
            </div>
        </div> 
    </div>
</form>