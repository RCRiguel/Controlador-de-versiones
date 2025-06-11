<?php
require_once("layout/header.php");
?>
<a href="index.php?m=nuevo" class="btn">NUEVO</a>
<table>
    <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>ACCIÓN</td>
    </tr>
    <tbody>
        <?php
        if(!empty($data)):
            foreach($data as $key => $value):
                foreach($value as $v): ?>
                <tr>
                    <td><?php echo $v['id'] ?> </td>
                    <td><?php echo $v['nombre'] ?> </td>
                    <td>
                        <a class="btn" href="index.php?m=editar&id=<?php echo $v['id']?>">EDITAR</a>
                        <a class="btn" href="index.php?m=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('¿ESTA SEGURO?')">ELIMINAR</a>
                    </td>
                </tr>
                <?php endforeach;
            endforeach;
        else: ?>
        <tr>
            <td colspan="3">NO HAY REGISTROS</td>
        </tr>
        <?php endif ?>
    </tbody>
</table>
<?php
require_once("layout/footer.php");
?>