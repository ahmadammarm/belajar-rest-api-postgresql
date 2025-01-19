"use client"

import React, { useEffect, useState } from "react"
import { Card, CardDescription, CardTitle } from "./ui/card"

interface ProductProps {
    id: string
    name: string
    description: string
    price: string
    stock: string
}


const ProductCard: React.FC = () => {

    const [products, setProducts] = useState<ProductProps[]>([])

    const fetchProduct = async () => {
        try {
            const response = await fetch("http://127.0.0.1:8000/api/v1/products")
            const data = await response.json()
            const result = data.data
            console.log(result)
            setProducts(result)
        } catch(error) {
            console.log(error)
        }
    }

    useEffect(() => {
        fetchProduct()
    }, [])

  return (
    <div className="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 py-5">
        {products.map((product, index) => (
            <Card key={index} className="px-4 py-5">
                <CardTitle className="text-center mb-10">
                    {product.name}
                </CardTitle>
                <CardDescription className="font-bold">
                    {product.description}
                </CardDescription>
                <CardDescription className="italic">
                    {product.price}
                </CardDescription>
            </Card>
        ))}  
    </div>
  )
}

export default ProductCard
