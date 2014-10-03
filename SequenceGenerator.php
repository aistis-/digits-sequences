<?php

class SequenceGenerator
{
    /**
     * Array of permitted digits and their positions.
     *
     * @var array
     */
    private $rules;

    /**
     * Result.
     *
     * @var array
     */
    private $result;

    /**
     * Generate all possible permutations.
     *
     * @param int $n
     * @param array $rules
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function generatePermutations($n, array $rules)
    {
        if (false === ((0 < $n) && (10 > $n))) {
            throw new Exception('A number must be bigger than 0, but less than 10');
        }

        $this->rules = $rules;

        $this->generate(range(1, $n));

        return $this->result;
    }

    /**
     * Recursion to get sequences.
     *
     * @param array $items
     * @param array $perms
     */
    private function generate($items, $perms = array())
    {
        if (empty($items)) {
            $sequence = join('', $perms);

            foreach ($this->rules as $position => $rule) {
                if (in_array(intval($sequence{$position - 1}), $rule)) {
                    return;
                }
            }

            $this->result[] = $sequence;
        }  else {
            for ($i = count($items) - 1; $i >= 0; --$i) {
                $newItems = $items;
                $newPerms = $perms;

                list($list) = array_splice($newItems, $i, 1);

                array_unshift($newPerms, $list);

                $this->generate($newItems, $newPerms);
            }
        }
    }
}
