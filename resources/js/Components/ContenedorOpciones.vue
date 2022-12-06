<template>
    <div class="contenedor-opciones">
        <!-- contenedor-opciones -->
        <button class="material-symbols-outlined">admin_panel_settings</button>
        <p align="center">Menu Admin</p>
        <button class="icons material-symbols-outlined">filter_alt</button>
        <p align="center">Perfiles</p>
        <button class="icons material-symbols-outlined">visibility</button>
        <p align="center">Mis Seguimientos</p>
        <button class="icons material-symbols-outlined">folder</button>
        <p align="center">Carpetas</p>
        <button class="icons material-symbols-outlined">folder_open</button>
        <p align="center">Todos los contratos</p>
        <button class="icons material-symbols-outlined">settings</button>
        <p align="center">Ajustes</p>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.contenedor-opciones {
    display: flex;
    flex-direction: column;
    // border: solid 2px red;
    align-items: center;
}

.material-symbols-outlined {
    font-size: 50px;
    color: rgb(170, 170, 170);
    margin: 15px;
}

p {
    font-size: 13px;
    color: rgb(120, 120, 120);
}
</style>
