<div id="login">
    <div class="alert">
        Acaba de ingresar en un &aacute;rea no autorizada. Por favor, ingrese como un usuario autorizado.
    </div>
  <h2>Inicio de sesi&oacute;n</h2>
  <form id="form1" name="form1" method="post" action="<?php echo url_for('@sf_guard_signin') ?>">
      <div class="form">
          <table>
              <tfoot>
                  <tr>
                      <td colspan="2">
                          <div style="text-align: center"><button type="submit">Ingresar</button></div>
                      </td>
                  </tr>
              </tfoot>
              <!--<tr>
                  <td><label for="label"></label></td>
                  <td><input type="text" name="login" id="label" /></td>
              </tr>
              <tr>
                  <td><label for="password">Contraseña: </label></td>
                  <td><input type="text" name="password" id="password" /></td>
              </tr>
              <tr>
                  <td colspan="2"><div align="center">
                      <button type="submit">Ingresar</button>
                  </div></td>
              </tr>-->
              <?php echo $form ?>
          </table>
          <br />
      </div>
  </form>
</div>