<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'judul' => 'Stories And Poems',
                'penulis' => 'Miles Kelly Publishing Ltd',
                'penerbit' => 'Keputaskaan Libra',
                'tahunTerbit' => '2022-01-01',
                'stock' => 1,
                'deskripsi' => 'Jelajahi keajaiban dan keajaiban mendongeng dengan buku menyenangkan yang berisi cerita dan puisi yang menarik ini! Anak-anak kecil akan senang bersantai saat bercerita dan memilih satu (atau tiga!) dari 12 cerita dan sajak klasik untuk dibaca di malam hari termasuk Goldilocks dan Tiga Beruang, Tiga Babi Kecil, Kerudung Merah Kecil, Singa dan Tikus , Twinkle, Twinkle Little Star, dan banyak lagi. Ilustrasi manis dan cerita klasik yang disukai menciptakan ritual berharga sebelum tidur yang akan dinikmati oleh anak-anak dan orang dewasa.',
                'front_book_cover' => 'photos/seeder/storiesAndPoems-front.png',
                'back_book_cover' => 'photos/seeder/storiesAndPoems-back.png',
            ],
            [
                'judul' => 'Easter Ann Peters',
                'penulis' => 'Jody Lamb',
                'penerbit' => 'Jody Lamb Communications',
                'tahunTerbit' => '2022-02-01',
                'stock' => 2,
                'deskripsi' => 'Twelve-year-old Easter Ann Peters has a plan to make seventh grade awesome: Operation Cool. Shes determined to erase years of being known as the quiet, straight-A student who cant think of a decent comeback to a bully she calls Horse Girl. When the confident new girl, Wreni, becomes her long-needed best friend, Easter lets her personality shine. The coolest guy in school takes a sudden interest. But as tough times at school fade away, so does a happy life at home. Mom is drinking, and Easter works double-overtime to keep their secret in the tiny lakeside town. Operation Cool derails. Fast. Can Easter discover the solution in time? Or will seventh grade be her worst year yet? Short Summary: Twelve-year-old Easter Ann Peters’ Operation Cool, a plan to make her seventh grade year awesome, is derailed as Easter copes with her mother’s alcoholism in their tiny lakeside town.',
                'front_book_cover' => 'photos/seeder/easterAnnPeters-front.png',
                'back_book_cover' => 'photos/seeder/easterAnnPeters-back.png',
            ],
            [
                'judul' => 'Easter Ann Peters',
                'penulis' => 'Jody Lamb',
                'penerbit' => 'Jody Lamb Communications',
                'tahunTerbit' => '2022-02-01',
                'stock' => 2,
                'deskripsi' => 'Twelve-year-old Easter Ann Peters has a plan to make seventh grade awesome: Operation Cool. Shes determined to erase years of being known as the quiet, straight-A student who cant think of a decent comeback to a bully she calls Horse Girl. When the confident new girl, Wreni, becomes her long-needed best friend, Easter lets her personality shine. The coolest guy in school takes a sudden interest. But as tough times at school fade away, so does a happy life at home. Mom is drinking, and Easter works double-overtime to keep their secret in the tiny lakeside town. Operation Cool derails. Fast. Can Easter discover the solution in time? Or will seventh grade be her worst year yet? Short Summary: Twelve-year-old Easter Ann Peters’ Operation Cool, a plan to make her seventh grade year awesome, is derailed as Easter copes with her mother’s alcoholism in their tiny lakeside town.',
                'front_book_cover' => 'photos/seeder/easterAnnPeters-front.png',
                'back_book_cover' => 'photos/seeder/easterAnnPeters-back.png',
            ],
            [
                'judul' => 'A dash Of Belladonna',
                'penulis' => 'Jenn Rackham',
                'penerbit' => 'Jenn Rackham Communications',
                'tahunTerbit' => '2022-02-01',
                'stock' => 1,
                'deskripsi' => '<p>Lottie, a young potion master, comes to New Zealand to study under her new master Mikaere.</p><p>During her studies, she manages to gets into all sorts of trouble, trying to steal sheeps blood, getting kidnapped, perverting course of the justice and getting involved in a super dangerous magic she cant handle.</P>',
                'front_book_cover' => 'photos/seeder/AdashOfBelladonna-front.png',
                'back_book_cover' => 'photos/seeder/AdashOfBelladonna-back.png',
            ],
            [
                'judul' => 'Vultures And King',
                'penulis' => 'William Joseph',
                'penerbit' => 'William Joseph Communications',
                'tahunTerbit' => '2022-02-01',
                'stock' => 1,
                'deskripsi' => 'On the heels of the tragic loss of his mother, Billy, a precocious 10-year old boy, moves to a new house with his father. After getting lost in the nearby forest, he soon finds himself in a world full of talking animals and is thrust into a fight for survival amid a quickly escalating war in the animal kingdom. Rescued by a horse named Chestnut, the two embark on an epic race-against-time journey to find a way to prevent catastrophe from happening. Will Billy and Chestnut be able to stop an all-out war from occurring? Will Billy be able to find a way back home?Of Vultures and Kings is a story about hope, courage, and the strong bonds of friendship.',
                'front_book_cover' => 'photos/seeder/vulturesAndKing-front.png',
                'back_book_cover' => 'photos/seeder/vulturesAndKing-back.png',
            ],
            // Tambahkan data buku lainnya di sini sesuai kebutuhan
        ];

        foreach ($books as $book) {
            Buku::create($book);
        }
    }
}
