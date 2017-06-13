
<footer class="footer">
      <p>Clínica CEO</p>
  </footer>

</div>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="<?php echo BASE_URL; ?>js/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="<?php echo BASE_URL; ?>js/bootstrap.min.js"></script>
    <!-- MaskedInput (Inclusão de máscaras customizadas nos formulários) -->
    <script src="<?php echo BASE_URL; ?>js/jquery.maskedinput.js"></script>
    <!-- Jquery UI (Inclusão de plugins adicionais do Jquery) -->
    <script src="<?php echo BASE_URL; ?>js/jquery-ui.min.js"></script>
    <!-- Jquery-UI DateTimePicker (Inclusão do plugin adicional do Jquery UI) -->
    <script src="<?php echo BASE_URL; ?>js/jquery.datetimepicker.full.js"></script>


    <script type="text/javascript">
      // Máscaras
		  $( ".telefone" ).mask( "(99) 9999-9999?9" );
      // $( ".data" ).mask( "99/99/9999" );
      $( "#cpf" ).mask( "999.999.999-99" );

      $.datetimepicker.setLocale('pt-BR');

		  // Somente data
      $( ".datepicker" ).datetimepicker({
        timepicker:false,
        months: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
        "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
        dayOfWeek: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
        format:'d/m/Y',
      });

      // Data e Hora
      $( ".datetimepicker" ).datetimepicker({
        months: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
        "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
        dayOfWeek: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
        format:'d/m/Y H:i',
        yearStart: new Date().getFullYear(),
        closeOnDateSelect:false
        // yearEnd: new Date()->getFullYear() + 1;
      });
		</script>

  </body>
</html>