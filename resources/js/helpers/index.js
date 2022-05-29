import axios from "axios"

export const priceFormat = (price) => {
    return new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' })
        .format(price / 100)
}

export const registerOrder = async () => {
    await axios.post('/orders')
        .then(r => console.log(r))
        .catch(e => console.log(e));
}