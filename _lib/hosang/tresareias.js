/**
 * Created by arthur on 19/07/16.
 */

function tresAreiasInit() {
}

function submitFormOnCtrlEnter(event, funcaoExecutar){
    if (event.ctrlKey && event.keyCode == 13) {
        funcaoExecutar();
    }
}