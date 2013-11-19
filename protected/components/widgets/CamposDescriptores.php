<?php
    class CamposDescriptores extends CWidget {
        public $model; //empresa
        public $describible;
        public $tipo = '';
        public $form;
        
        public function run() {
            $aDescriptores = $this->model->descriptores;
            
            foreach ($aDescriptores as $oDescriptor) {
                if ($this->tipo == $oDescriptor->tipo) {
                    if ($this->describible->check($oDescriptor)) {
                        echo '<div class="row descriptor">';
                        echo '<label for="ValorDescriptor_valor">';
                        echo $oDescriptor->nombre;
                        echo '</label>';
                        if ($oDescriptor->tipo_valor != "formula")
                        echo '<input class="' . ($oDescriptor->tipo_valor=='fecha' ? "datepicker" : "") . '"" type="text" name="ValoresDescriptor[valor][]" value="' . $this->describible->buscarValor($oDescriptor) . '" />';
                        else {
                            
                            echo $this->describible->evaluarFormula($oDescriptor);
                        }
                        echo $this->form->error($this->describible,$oDescriptor->nombre);
                        echo '<input type="hidden" name="ValoresDescriptor[id_descriptor][]" value="' . $oDescriptor->id . '" />';
                        echo '<input type="hidden" name="ValoresDescriptor[id_describible][]" value="' . $this->describible->id . '" />';
                        echo '<input type="hidden" name="ValoresDescriptor[tipo][]" value="' . $oDescriptor->tipo_valor . '" />';
                        echo '</div>';
                    }
                }
            }
        }
    }
?>