<?php

# Membuat class Animal
class Animal
{
    # Property animals untuk menyimpan data hewan
    private $animals = [];

    # Method constructor - mengisi data awal
    # Parameter: data hewan (array)
    public function __construct($data)
    {
        $this->animals = $data;
    }

    # Method index - menampilkan data animals
    public function index()
    {
        # Gunakan foreach untuk menampilkan data animals (array)
        foreach ($this->animals as $key => $animal) {
            echo ($key + 1) . ". " . $animal . "\n";
        }
    }

    # Method store - menambahkan hewan baru
    # Parameter: hewan baru
    public function store($data)
    {
        # Gunakan method array_push untuk menambahkan data baru
        array_push($this->animals, $data);
        echo "$data telah ditambahkan.\n";
    }

    # Method update - memperbarui data hewan
    # Parameter: index dan hewan baru
    public function update($index, $data)
    {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
            echo "Hewan pada index " . ($index + 1) . " telah diperbarui menjadi $data.\n";
        } else {
            echo "Index tidak ditemukan.\n";
        }
    }

    # Method destroy - menghapus data hewan
    # Parameter: index
    public function destroy($index)
    {
        if (isset($this->animals[$index])) {
            $removedAnimal = $this->animals[$index];
            array_splice($this->animals, $index, 1);
            echo "$removedAnimal telah dihapus.\n";
        } else {
            echo "Index tidak ditemukan.\n";
        }
    }
}

# Membuat object dan mengirimkan data hewan (array) ke constructor
$animal = new Animal(['Kucing', 'Anjing', 'Burung']);

echo "Index - Menampilkan seluruh hewan \n";
$animal->index();
echo "\n";

echo "Store - Menambahkan hewan baru \n";
$animal->store('Ikan');
$animal->index();
echo "\n";

echo "Update - Mengupdate hewan \n";
$animal->update(1, 'Kucing Anggora');
$animal->index();
echo "\n";

echo "Destroy - Menghapus hewan \n";
$animal->destroy(2);
$animal->index();
echo "\n";
