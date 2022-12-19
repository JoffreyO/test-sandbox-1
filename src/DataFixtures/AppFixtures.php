<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Variant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $wedding = (new Category())->setName('Wedding');
        $christmas = (new Category())->setName('Christmas');
        $birthday = (new Category())->setName('Birthday');

        $manager->persist($wedding);
        $manager->persist($christmas);
        $manager->persist($birthday);

        $manager->persist($this->buildProduct('Zola', false, [150, 250], [$wedding]));
        $manager->persist($this->buildProduct('Flavia', true, [131], [$wedding]));
        $manager->persist($this->buildProduct('Giorgia', false, [147, 300], [$wedding, $birthday]));
        $manager->persist($this->buildProduct('Romane', false, [400, 500], [$birthday]));
        $manager->persist($this->buildProduct('Xmas', true, [500], [$christmas]));
        $manager->persist($this->buildProduct('Santa', true, [400, 800], [$christmas]));

        $manager->flush();
    }

    /**
     * @param string $productName
     * @param int[] $prices
     * @param Category[] $categories
     *
     * @return Product
     */
    private function buildProduct(string $productName, bool $isNew, array $prices, array $categories): Product
    {
        $product = (new Product())
            ->setName($productName)
            ->setNew($isNew);

        foreach ($prices as $index => $price) {
            $product->addVariant(
                (new Variant())
                    ->setName("Version $index")
                    ->setPrice($price)
            );
        }
        foreach ($categories as $category) {
            $product->addCategory($category);
        }

        return $product;
    }
}
