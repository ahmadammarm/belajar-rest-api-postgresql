"use client"

import React, { useEffect, useState } from 'react'
import { Button } from './ui/button'


const ItemForm: React.FC = () => {

    const [formData, setFormData] = useState({
        name: "",
        description: ""
    })

    const fetchItem = async () => {
        try {
            const response = await fetch("http://127.0.0.1:8000/api/v1/items")
            const data = await response.json()
            const result = data.data
            console.log(result)
        } catch(error) {
            console.log(error)
        }
    }

    const handleSubmit = async (e: React.FormEvent) => {
        e.preventDefault()
        await fetch("http://127.0.0.1:8000/api/v1/items", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        });
        fetchItem()
        setFormData({
            name: '',
            description: ''
        })

    }

    useEffect(() => {
        fetchItem()
    })

  return (
    <div>
         {/* Add item Form */}
         <form onSubmit={handleSubmit} className="mb-8">
            <div className="flex flex-col gap-4 max-w-md">
              <input
                type="text"
                placeholder="item Name"
                value={formData.name}
                onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                className="border p-2 rounded text-black"
                required
              />
              <textarea
                placeholder="Description"
                value={formData.description}
                onChange={(e) => setFormData({ ...formData, description: e.target.value })}
                className="border p-2 rounded text-black"
                required
              />
              <Button type="submit" className="text-white p-2 rounded">
                Add item
              </Button>
            </div>
          </form>
    </div>
  )
}

export default ItemForm
