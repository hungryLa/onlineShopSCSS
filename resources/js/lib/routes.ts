export const pathKeys = {
    client: {
        root: '/',
        products: {
            root() {
                return pathKeys.client.root.concat('products/')
            },
            getById(id?: string) {
                return pathKeys.client.products.root().concat(`/${id ? id : ':id'}`)
            }
        }

    }
}
