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
    color: #7c7c7c;
    padding: 0px 15px 0px 15px;
}
.input-visualizar {
    margin: 15px 25px 15px 5px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    border: 2px solid #e6e6e6;
    padding: 0px 5px 0px 40px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
    font-size: 13px;
    color: #7c7c7c;
}
span {
    margin-right: 7px;
}
</style>
