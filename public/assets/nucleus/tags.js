function insertTag(id, toInsert, toInsertAfter, cursorWhere) {
    let target = document.getElementById(id);
    if (target.setRangeText) {
        target.setRangeText(toInsert + toInsertAfter);
        target.focus();
        setCaretToPos(target, Number(doGetCaretPosition(target) - cursorWhere));
    } else {
        target.focus();
        document.execCommand("insertText", false /*no UI*/, toInsert + toInsertAfter);
        target.focus();
    }
}

function setSelectionRange(input, selectionStart, selectionEnd) {
    if (input.setSelectionRange) {
        input.focus();
        input.setSelectionRange(selectionStart, selectionEnd);
    }
    else if (input.createTextRange) {
        let range = input.createTextRange();
        range.collapse(true);
        range.moveEnd('character', selectionEnd);
        range.moveStart('character', selectionStart);
        range.select();
    }
}

function setCaretToPos(input, pos) {
    setSelectionRange(input, pos, pos);
}

/*
** Returns the caret (cursor) position of the specified text field (oField).
** Return value range is 0-oField.value.length.
*/
function doGetCaretPosition(oField) {
    // Initialize
    let iCaretPos = 0;
    // IE Support
    if (document.selection) {
        // Set focus on the element
        oField.focus();
        // To get cursor position, get empty selection range
        let oSel = document.selection.createRange();
        // Move selection start to 0 position
        oSel.moveStart('character', -oField.value.length);
        // The caret position is selection length
        iCaretPos = oSel.text.length;
    }
    // Firefox support
    else if (oField.selectionStart || oField.selectionStart == '0')
        iCaretPos = oField.selectionDirection == 'backward' ? oField.selectionStart : oField.selectionEnd;
    // Return results
    return iCaretPos;
}