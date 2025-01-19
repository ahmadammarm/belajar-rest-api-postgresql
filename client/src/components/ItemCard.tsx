"use client"

import React, { useEffect, useState } from 'react'
import { Card, CardTitle } from './ui/card'


interface ItemProps {
    name: string
    description: string
}

const ItemCard: React.FC = () => {

    const [items, setItems] = useState<ItemProps[]>([])

    const fetchItem = async () => {
        try {
            const response = await fetch("http://127.0.0.1:8000/api/v1/items")
            const data = await response.json()
            const result = data.success
            setItems(result)
            console.log(data)
        } catch(error) {
            console.log(error)
        }
    }

    useEffect(() => {
        fetchItem()
    }, [])

  return (
    <div>
        {items.map((item, index) => (
            <Card key={index}>
                <CardTitle>
                    {item.name}
                </CardTitle>
            </Card>
        ))}
    </div>
  )
}

export default ItemCard
