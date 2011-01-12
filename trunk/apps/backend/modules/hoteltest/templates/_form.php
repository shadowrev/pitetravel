<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('hoteltest/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?hot_codigo='.$form->getObject()->getHotCodigo() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('hoteltest/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'hoteltest/delete?hot_codigo='.$form->getObject()->getHotCodigo(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['hot_nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['hot_nombre']->renderError() ?>
          <?php echo $form['hot_nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hot_direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['hot_direccion']->renderError() ?>
          <?php echo $form['hot_direccion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hot_telefono']->renderLabel() ?></th>
        <td>
          <?php echo $form['hot_telefono']->renderError() ?>
          <?php echo $form['hot_telefono'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hot_web']->renderLabel() ?></th>
        <td>
          <?php echo $form['hot_web']->renderError() ?>
          <?php echo $form['hot_web'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hot_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['hot_email']->renderError() ?>
          <?php echo $form['hot_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['hot_valor_noche']->renderLabel() ?></th>
        <td>
          <?php echo $form['hot_valor_noche']->renderError() ?>
          <?php echo $form['hot_valor_noche'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
