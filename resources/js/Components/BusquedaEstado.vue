<template>
    <div class="input">
        <span>Visualizar</span>
        <select class="input-visualizar">
            <option value="">todos</option>
            <option value="">Vistos Recientemente</option>
            <option value="">No Leidos</option>
        </select>
    </div>
</template>
<style lang="scss" scoped>
.input {
    margin-left: 200px;
    font-size: 13px;
    padding: 0px 15px 0px 15px;
}
.input-visualizar {
    margin: 0px 25px 0px 0px;
    border-radius: 10px;
    // border: 2px solid #c9c9c9;
    padding: 0px 15px 0px 15px;
    font-size: 13px;
}
span {
    margin-right: 7px;
}
</style>
