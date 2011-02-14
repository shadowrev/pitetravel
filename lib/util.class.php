<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of util
 *
 * @author raulerne
 */
class Util
{
    /**
     * Genera una lista generica
     * @param <type> $items Elementos de la lista.
     * @param <type> $opciones Etiquetas y opciones adicionales
     *  - 'labels' array con nombres de la cabecera
     *  - 'options' array con las opciones 'modificar', 'eliminar', 'ver'
     *  - 'parametros' parametros adicionales. Por ahora solo esta definido 'funcion_ajax'
     * @return string
     */
    public function generarLista($items, $opciones, $lista_ajax = false)
    {
        $lista_tabla = '<table>';

        $lista_tabla .= '<thead>';
        if(isset($opciones['cabecera']))
        {
            $lista_tabla .= '<tr>';
            $lista_tabla .= '<th>&nbsp;</th>';

            foreach($opciones['cabecera'] as $item_cabecera)
            {
                $lista_tabla .= '<th>' . $item_cabecera . '</th>';
            }

            if(!empty($opciones['options']))
            {
                $lista_tabla .= '<th colspan="' . sizeof($opciones['options']) . '">&nbsp;</th>';
            }

            $lista_tabla .= '</tr>';
        }
        $lista_tabla .= '</thead>';

        $lista_tabla .= '<tbody>';
        $impar = true;
        $contador = 1;
        foreach($items as $item)
        {
            $class = '';
            if($impar)
            {
                $class = 'class="impar"';
            }
            else
            {
                $class = 'class="par"';
            }

            $lista_tabla .= '<tr ' . $class . '><td>' . $contador . '</td>';
            //foreach($item as $param)
            for($i = 1; $i < sizeof($item); $i ++)
            {
                $lista_tabla .= '<td>' . $item[$i] . '</td>';
            }
            if(!empty($opciones['options']))
            {
                if($lista_ajax)
                {
                    foreach($opciones['options'] as $tags => $operation)
                    {
                        $enlace = 'javascript:cargarUrlAjax(window.opener.' . $opciones['parametros']['funcion_ajax'] . ', ' . $item[0] . ')';
                        $lista_tabla .= '<td><a href="' . $enlace . '">[' . $tags . ']</a></td>';
                    }
                }
                else
                {
                    foreach($opciones['options'] as $tags => $operation)
                    {
                        // TODO ver como poner los enlaces aqui
                        $enlace = 'javascript:cargarUrlExterno(&quot;' . url_for($operation . '?pac_codigo=' . $item[0]) . '&quot;, window.opener)';
                        $lista_tabla .= '<td><a href="' . $enlace . '">[' . $tags . ']</a></td>';
                    }                    
                }
            }
            $lista_tabla .= '</tr>';
            $impar = !$impar;
            $contador ++;
        }
        $lista_tabla .= '</tbody>';
        $lista_tabla .= '</table>';
        return $lista_tabla;
    }

    public static function calcularDias($fecha_inicial, $fecha_final)
    {
        $timestamp_ini = mktime(0, 0, 0, $fecha_inicial['month'], $fecha_inicial['day'], $fecha_inicial['year']);
        $timestamp_fin = mktime(0, 0, 0, $fecha_final['month'], $fecha_final['day'], $fecha_final['year']);

        $diferencia = floor(abs($timestamp_fin - $timestamp_ini) / 86400);

        return $diferencia;
    }
}
?>
