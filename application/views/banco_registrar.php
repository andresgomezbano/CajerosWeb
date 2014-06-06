<form method="POST" name="frm_banco">
    <div class="row">
        <div class="small-8">
            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Nombre:</label>
                </div>
                <div class="small-9 columns">
                    <?=$form->id?>
                    <?=$form->nombre?>
                    <?=form_error('nombre')?>
                </div>
            </div>

            <div class="row">
                <div class="small-3 columns">
                    <label for="right-label" class="right inline">Estado:</label>
                </div>
                <div class="small-9 columns"><?=$form->estado?></div>
            </div>

            <input type="submit" value="Guardar" class="button right"/>
        </div> 
    </div>
</form>