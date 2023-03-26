function Message ({ message }) {

    // Klaustuka naudojame, kai nezinome ar tai objektas ar ne. jis nurodo, kad mes tikriname, kad jeigu tai yra objektas, mes bandysime kreiptis i key'u m, jeigu tai ne objektas i key'u nesikreipsim, bet ir negausime klaidos

    return message?.m &&
    <div className={'alert alert-' + message.s}>
        {message.m}
    </div>
}

export default Message;