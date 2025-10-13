<?php

namespace App\Helpers;

class TreeHelper
{
    /**
     * Create flat indented lists for any tree model.
     *
     * @param \Illuminate\Support\Collection $items
     * @param string $childrenKey
     * @param string $displayKey
     * @param string $prefix
     * @param array $result
     * @param int $level
     * @param string $slug
     * @param bool $parent
     * @return array
     */
    public static function getIndentedList(
        $items,
        $childrenKey = 'children',
        $displayKey = 'name',
        &$result = [],
        $level = 0,
        $parent = null
    ) {
        foreach ($items as $item) {
            $result[] = [
                'id' => $item->id,
                'name' => str_repeat('--', $level) . ' ' . $item->$displayKey,
                'level' => $level,
                'parent_name' => $parent ? $parent->$displayKey : null,
                'original' => $item,
                'slug' => $item->slug,
                'is_active' => $item->is_active,
            ];

            if ($item->$childrenKey?->isNotEmpty()) {
                self::getIndentedList(
                    $item->$childrenKey,
                    $childrenKey,
                    $displayKey,
                    $result,
                    $level + 1,
                    $item
                );
            }
        }

        return $result;
    }
}
