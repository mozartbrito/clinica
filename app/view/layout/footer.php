
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


    <script type="text/javascript">
      // Máscaras
		  $( ".telefone" ).mask( "(99) 9999-9999?9" );
      // $( ".data" ).mask( "99/99/9999" );
      $( "#cpf" ).mask( "999.999.999-99" );

		  // DatePicker
      $( ".datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd/mm/yy",
        closeText: "Fechar",
        prevText: "&#x3C;Anterior",
        nextText: "Próximo&#x3E;",
        currentText: "Hoje",
        monthNames: [ "Janeiro","Fevereiro","Março","Abril","Maio","Junho",
        "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro" ],
        monthNamesShort: [ "Jan","Fev","Mar","Abr","Mai","Jun",
        "Jul","Ago","Set","Out","Nov","Dez" ],
        dayNames: [
          "Domingo",
          "Segunda-feira",
          "Terça-feira",
          "Quarta-feira",
          "Quinta-feira",
          "Sexta-feira",
          "Sábado"
        ],
        dayNamesShort: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
        dayNamesMin: [ "Dom","Seg","Ter","Qua","Qui","Sex","Sáb" ],
        weekHeader: "Sm",
        dateFormat: "dd/mm/yy",
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: "",
      });
		</script>

  </body>
</html>