<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // ── Catégories ──────────────────────────────────────────────────────────
        $categoriesData = [
            ['name' => 'SOC',   'slug' => 'soc',   'image' => 'https://picsum.photos/seed/cat-soc/800/500',   'description' => 'Security Operations Center - surveillance continue 24/7.'],
            ['name' => 'EDR',   'slug' => 'edr',   'image' => 'https://picsum.photos/seed/cat-edr/800/500',   'description' => 'Endpoint Detection & Response - protection des endpoints.'],
            ['name' => 'XDR',   'slug' => 'xdr',   'image' => 'https://picsum.photos/seed/cat-xdr/800/500',   'description' => 'Extended Detection & Response - vision globale multi-sources.'],
            ['name' => 'Audit', 'slug' => 'audit', 'image' => 'https://picsum.photos/seed/cat-audit/800/500', 'description' => 'Audit de securite et tests d\'intrusion.'],
            ['name' => 'MFA',   'slug' => 'mfa',   'image' => 'https://picsum.photos/seed/cat-mfa/800/500',   'description' => 'Multi-Factor Authentication - acces securise.'],
            ['name' => 'SIEM',  'slug' => 'siem',  'image' => 'https://picsum.photos/seed/cat-siem/800/500',  'description' => 'Security Information & Event Management.'],
        ];

        $categories = [];
        foreach ($categoriesData as $data) {
            $cat = new Category();
            $cat->setName($data['name']);
            $cat->setSlug($data['slug']);
            $cat->setImage($data['image']);
            $cat->setDescription($data['description']);
            $manager->persist($cat);
            $categories[$data['slug']] = $cat;
        }

        // ── Produits ────────────────────────────────────────────────────────────
        $productsData = [
            [
                'name'        => 'SOC Starter',
                'slug'        => 'soc-starter',
                'description' => 'Surveillance continue 24/7 de vos systèmes. Idéal pour les PME.',
                'price'       => '19.00',
                'image'       => 'https://picsum.photos/seed/p1/800/500',
                'featured'    => true,
                'category'    => 'soc',
            ],
            [
                'name'        => 'SOC Enterprise',
                'slug'        => 'soc-enterprise',
                'description' => 'SOC managé complet avec playbooks et reporting avancé.',
                'price'       => '99.00',
                'image'       => 'https://picsum.photos/seed/p4/800/500',
                'featured'    => true,
                'category'    => 'soc',
            ],
            [
                'name'        => 'EDR Standard',
                'slug'        => 'edr-standard',
                'description' => 'Protection endpoint & remédiation niveau 1.',
                'price'       => '49.00',
                'image'       => 'https://picsum.photos/seed/p2/800/500',
                'featured'    => true,
                'category'    => 'edr',
            ],
            [
                'name'        => 'XDR Plus',
                'slug'        => 'xdr-plus',
                'description' => 'Corrélation multi-sources, priorisation intelligente, dashboards.',
                'price'       => '79.00',
                'image'       => 'https://picsum.photos/seed/p3/800/500',
                'featured'    => true,
                'category'    => 'xdr',
            ],
            [
                'name'        => 'MFA Access',
                'slug'        => 'mfa-access',
                'description' => 'Authentification multi-facteurs intégrée pour tous vos accès.',
                'price'       => '9.00',
                'image'       => 'https://picsum.photos/seed/p5/800/500',
                'featured'    => false,
                'category'    => 'mfa',
            ],
            [
                'name'        => 'Audit Pentest',
                'slug'        => 'audit-pentest',
                'description' => 'Tests d\'intrusion et rapport de vulnerabilites detaille.',
                'price'       => '299.00',
                'image'       => 'https://picsum.photos/seed/p6/800/500',
                'featured'    => false,
                'category'    => 'audit',
            ],
        ];

        foreach ($productsData as $data) {
            $product = new Product();
            $product->setName($data['name']);
            $product->setSlug($data['slug']);
            $product->setDescription($data['description']);
            $product->setPrice($data['price']);
            $product->setImage($data['image']);
            $product->setFeatured($data['featured']);
            if (isset($categories[$data['category']])) {
                $product->setCategory($categories[$data['category']]);
            }
            $manager->persist($product);
        }

        $manager->flush();
    }
}
