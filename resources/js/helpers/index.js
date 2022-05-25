export const priceFormat = (price) => {
    return new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR' })
        .format(price / 100)
}