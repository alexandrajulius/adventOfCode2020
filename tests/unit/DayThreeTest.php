<?php

declare(strict_types=1);

namespace Tests\unit;

use Generator;
use DayThree;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

final class DayThreeTest extends TestCase
{
    // Tree Grid
    public function testCanBeInstantiated(): void
    {
        Assert::assertInstanceOf(DayThree::class, new DayThree());
    }

    /**
     * @dataProvider provideTreeGridData
     */
    public function testFindsAmountOfTrees(int $stepsToTheRight, array $treeGrid, int $expected): void
    {
        $actual = (new DayThree())->getAmountOfTrees($stepsToTheRight, $treeGrid);

        self::assertEquals($expected, $actual);
    }

    public function provideTreeGridData(): Generator
    {
        yield 'Tree Grid a' => [
            'stepsToTheRight' => 3,
            'treeGrid' => [
                '..##.......',
                '#...#...#..'
            ],
            'result' => 0
        ];

        yield 'Tree Grid b' => [
            'stepsToTheRight' => 3,
            'treeGrid' => [
                '..##.........##.........##......',
                '#...#...#..#...#...#..#...#...#.',
                '.#....#..#..#....#..#..#....#..#',
                '..#.#...#.#..#.#...#.#..#.#...#.',
                '.#...##..#..#...##..#..#...##..#',
                '..#.##.......#.##.......#.##....',
                '.#.#.#....#.#.#.#....#.#.#.#....',
                '.#........#.#........#.#........',
                '#.##...#...#.##...#...#.##...#..',
                '#...##....##...##....##...##....',
                '.#..#...#.#.#..#...#.#.#..#...#.',
            ],
            'result' => 7
        ];

        yield 'Tree Grid c' => [
            'instepsToTheRightdex' => 3,
            'treeGrid' => [
                '...#...###......##.#..#.....##.','..#.#.#....#.##.#......#.#....#','......#.....#......#....#...##.','...#.....##.#..#........##.....','...##...##...#...#....###....#.','...##...##.......#....#...#.#..','..............##..#..#........#','#.#....#.........#...##.#.#.#.#','.#..##......#.#......#...#....#','#....#..#.#.....#..#...#...#...','#.#.#.....##.....#.........#...','......###..#....#..#..#.#....#.','##.####...#.............#.##..#','....#....#..#......#.......#...','...#.......#.#..#.........##.#.','......#.#.....###.###..###..#..','##..##.......#.#.....#..#....#.','..##.#..#....#.............##.#','....#.#.#..#..#........##....#.','.....####..#..#.###..#....##..#','#.#.......#...##.##.##..#....#.','.#..#..##...####.#......#..#...','#...##.......#...####......##..','...#.####....#.#...###.#.#...#.','....#...........#.##.##.#......','.....##...#.######.#..#....#..#','.#....#...##....#..######....#.','...#.....#...#####.##...#..#.#.','.....#...##........##.##.##.###','#.#..#....##....#......#....#.#','......##...#.........#....#.#..','###..#..##......##.#####.###.##','#.....#..##.##....#...........#','##..#.#..##..#.#.....#......#..','.#.##.#..#.#....##..#..#....#..','.#......##..##.#...#..#.......#','#....##.##..###..###......##.#.','....###..##.......#.###.#....#.','..##........#........##.....#..','.#..#.....#...####.##...##.....','....#.#.#.....#.##..##.....#..#','..............#.....#...#.....#','.#.....#......###...........#.#','.....#.#......#.##..#..........','.#......###............#.#.##..','.#.#....##.#..###.....#.##..#.#','.......#.#.#..#..#..#...##..#.#','.#.###...##.#.#.####.#.#...#...','...#.#....#......##.##.#.......','#...#.....##....#........##....','.....###...#.##.#......##.#..#.','..#...##.##.###..#..#......####','.#.##.#..#.##..##..........##..','..#.#.#..#.#.....#...###.....#.','..#..#.#....#.##.............##','.......#..###..#.#...#.....##.#','####.#.#......#..#.##.........#','..........#.....#..##......###.','..#..............#...#..##.....','......#.#.#..#.##.....####..##.','.##.#..#.#....#.......#..#.....','..#..#..#.##.#....###.#.#.#.#.#','.....#....#......###..#........','#.#.#..#...###.....#......#.##.','...#.#....#.#......#........#..','..#...###.#...#..#....##...#..#','.###.##..#..#...###.#..#.####..','#....#..##..##..#......#...##..','#.#..#...#..#...###..#.#.##....','##....#....##.####...#.#.###...','##.#...#.......#.##.##....#...#','..#.#..........#..#.#.#....#..#','..#........#...#....#....#....#','..#..#....#.......#........#...','......#....#....##.#....#.#.##.','.##...###.##.##....##.#...###..','.....##..#.#.....###..#.....###','....##.#.##...##..##........#..','#...#..##.#.#....#......#...#..','.###.##.#........#.####....#...','#.##.....#..#...#..##.##..#.#..','.....#.#..#....#..#...##.##.#..','.#......#####...##...#.#.###.#.','#......##....#.....#......##.#.','#.#.##.###.#......#####..#.....','........###.#...#..#.#........#','....#....###..#.##.#...#....#..','..........#..#.#....#...#.#...#','#.##......###.#.#.#....####...#','...#.#....#........##.#.....##.','.....##..#.#.#..###...##...#...','#...#...#....#....##........#..','.....#.........##.#......#..#..','#.....##..#.###.....#....##.##.','...#..#..#.#........##...##.#.#','..#..##.###.....#.#.....###.##.','..###.........#...##.....###...','...###...##.#...##....##.......','.#.#..#...###..#.#....#....#...','##..#.......#....#.#...#..#..#.','..#......#....####..##..#.###.#','..#.......##........#.#.#..#...','.#.......#.##.#.##.#.......#..#','###...#...#...#...#..#...#...##','..#..........#..###........##..','.##..#....##......##........#.#','......#.##......#......##...#.#','.#.#....#.#.#........#......#..','.#.#..#....####..##...##....#..','.#...##..#..#..#####....##.#...','.##.#.#...#...#.#...#.##.#...#.','###.#...##..#.###.#.....#.##.#.','#.....#.###.#.#...#..#....#.#..','..##..#....#......#.........###','.#...#...##......#...#.####....','..#.##...##..............#.#..#','..#......#..##...........#..#.#','..#####...#..#.......##...###..','..##..#....#.#...###.#...#.....','..#....#..#.#.......#..#.#.#...','.##..#.#.....##....#.......#...','...#.#..###...##....#....##..#.','.....##..#...##.####....##...#.','.......#.........#...#.##..####','........###..#..#.##.###..#....','.#.#..#.##.##.........#...#....','.###......#.....#....##....####','.##..##...........#.....#.....#','#.#.#.#.#.#.##..#.#.#..#.##....','.##.##...##..#....##..###..####','#..##.#......#...###.........#.','#..#...#..##..#..##.....##...#.','#...##..#...##.#.###.#...#.....','.###.....#.......#...#.##.###.#','..........#.#......#...###...##','..##....#.#..#....#.###...#..##','#.#..#....##.##..##.........##.','#.....#.##.###.#..#....##...#..','...#........##...#..###..######','#..#.#.#.#...#....#....###.#..#','...##.##.##.....##..#........#.','..#.#....#..#.......#...##.##.#','###.##.......##..#.####...#.#..','....#.#.....##.....#.#.##...#..','.#..##..#.....#.#..#...#..#..#.','.###....##...#......#.....#....','##.##.###......#...#...###.#...','#...#.##...#.#....##.....####..','#.#.#.#...###...##.............','..#....#.....##.#...#......#...','....#...#......#...#..#...#.#..','.###..#.....#..#...#....#...#..','..#...#.#..###.......#..#.#...#','#...###.##.....#....#..#.#..##.','...#.##.#.##......#.#.#.##.....','........####...##...##..#....#.','.#.#....#....#.#...##.###...##.','#.#...###.#.#.#....#....#.#....','.####.#..#.#....#..#.#..#..#...','#####...#...#...#....#.#.#..##.','..###.##.###...#..........#.##.','##.....#...#....###..###.#.#.#.','#..##.#..#..#..#...#.#...###..#','##....#.#...##......#.#...#...#','.##..........#.#....#...#.##..#','....#....####.#.####......#.###','..##.#.....####.#.####.......#.','#.##.##.#.....#.##......##...#.','......###..#.....#.....##......','..#..#....#.#...#.....#......##','##..#..#..###.#.#..#..##.....#.','#....#.#.....#####...#.#.......','.....#..#....#.#.#..#...#...#..','............#.##......##.##.#.#','....#...#.#........###....#....','..#..#...###.#....##..#..###.##','#.##....#...#.....##..#.##.#...','...##..###...#.#.....##.#......','.#..#.##.#####..#.......#..###.','...#.##...###.....####.#.#.....','.#......##.#.#.#.#.##.#.....#..','..#.##.#..##.......#.#.....##..','..................#....#...#...','.##.#..#.#.#..#.......#.#..##.#','....#........#......#..####..#.','#...#...##..##.#..#.......##...','#..#..#..#..#........####..#.#.','..#.#......#..#.##.##.#.#...#.#','...#..#......#.#.###.#.##..##..','..#...##.....#..#...##..#.#....','#.........#....#..#....##.##..#','..#..#.#....#..#...#.##.....#..','...#..#...#.#.....#..##..#.#...','....#........#.#....##..##..#..','#.....#.#..#.......#.##.....#..','.#.###.###...##...##..###...#..','.##.##.......#.#......#.....#.#','...#....##....#..#..........#.#','..#.##.........#.#.....#.....#.','...#.##..##.......##..##...#...','#.##......##.##..#.....##...##.','#.#.#..##...#.#............#.#.','....#.....#......##...#.#.....#','...#.#......#.#...###.......#..','......##..###....#.#...#.#####.','..#..#.#.#...##.#...###..##..#.','##.##.#.#.##.#..#....#...#...#.','#..#....######.##.#...#...#.#..','.#..#.##....#..#.#.......#....#','....#....#......##....##.#.#...','.###......#..#..#.......####..#','.#.#.....#..###...........##...','.##..##.##.....####..#..#..##..','..#..##.#......#...###.##..#.#.','....##..#.....###..#.##....##.#','#..#......#....#.........#.....','.#...#.....#.#..#..##....#.....','.##..#...#..##.#..#...........#','..#..##........##.......#..#...','#.....#....#....#.#.#...##.#...','...#...#.#.#..#.##.#.#...#.....','..#..#.#....#....###....#.#.#..','...###..#...#..#....#.....#....','...#...#.#..#.....#...###......','##......#..........#.#.#..#.#.#','....#.....#.....#..#..#.#.#.#..','...####...#.##...#.#..#....#.#.','#.##........##.............#.##','#.#.#.#.#.....................#','.#.###....#..##.##.##....#.....','#.#...#.####.###...#..#..#.#...','.##...#..###.......##..#.#.....','#.#.#.#...#...#.##.....#.......','.##.#.#.#......####..#.#.......','###..........#......#...##...#.','.........##...#.##...#.#.......','...#.#.....#...#..#...#..##..#.','.#..###...#.#.........###....#.','##..#...#........#.........##..','.....#...#.#...#.#.#...........','..#....##...#.#..#..#.##....##.','.##....#.#.....##.#..#..#...##.','..##......#.#...#.#.......##.#.','##...#..#...##.#........#.##...','#......#.##..#.#..#.###.......#','#.#...#.....#.#......#.#.#.....','#.....#..#.......#....##.#.#..#','###.#....#..##.#.##....#....#..','#.##.##....#.#..#.#...#....#...','####...#####...#.....#....##.#.','....#.#...#.#.##.#.#.##.#.#.###','#.....##.#.....#.#......#.#..#.','.#....##.#..#........#...##.#..','......#...#....##....##....##..','..###.....#....##.#...#..#.....','#....##...##.##..##.#...#...#..','#..#...#...#.#....##..#.#....#.','......................#.....#..','.#..#...#.........#....##...###','.##.#.#...##...#...#...#..#....','.#.###....#.#............##..#.','###..##.#.#.#.#....##...#......','.##................####...##.##','.#.#.........##....#.#.##.##.#.','....#...#...#...##...#.##.#..#.','.#.#........#..##.....#..#....#','##.#..#.#....#.....#...#...#...','.#...##....#.....##....#..#.#.#','####.....#..#....#......###.##.','##..##.#....###.....#...#......','.##.#...#.....#.#..#.#..#.#...#','.....#.#..#..#..###.#...###.#..','.#.#.##.#..#.#..#...#..#.......','..#.....#....#.##.##.##.......#','.#..##....###...#..............','#....#...#.#.......#....##.#...','....#.#..##.#....#..#.#....#.#.','#.........##...#.#.............','#.#.......##.....#...##..##.#.#','.......#....#..##...#..#######.','.#.#...##........#..#.....#.#..','.#.......#..#......#.##.##...##','.........#............#....#..#','.#......#...##...##...#....###.','.........#...#.#.###.......#...','###.#..#.#.#.#......##...#.#...','.#.........##.#....###....#.#..','#.#....#..#.##.#..#....##...#..','###.#...#..#..##........#.###..','.....#....#..#........#..#.##.#','..#.....##......#....#..#.#.#..','.#.........#.....#.....#.......','......#....#.###..#.#....#....#','..#.#..#.#.###.........#..#..#.','..#..#.#.#.........#....##.#.#.','#.......#........##...##....#..','##..#..#...###...#..##..#..#.#.','##..#..#....#.#..##..#..#.#..#.','..##.....##.#..#.#........###..','..#.#..#..##........#...#....##','.##..#....##..#..#..#..#.#....#','#....#.....##........#.....#.##','......#....#.#..#......#.##....','.......#..#..#......##.........','......#...#..##.....#......#..#','#..#..#....##....#........##..#','##....#...#.#.....#####........','...#.#..#.#.##.#.##..##...#....','..#..#..#..#..#....#..#..##...#','.#.....#....##.##....##.....#..','#...#.....#.....#.#...#.#....#.','.###...#..##....#..#...#.###...','....#..##..#.......#.##.##..###','#.......##.....#.......#.#...##','#.....#.#.#....#.#......#.#.#..','..##.....#..###......##........','.....#...#..##....#......#.....','#..#..#....#.#...#..###.......#','.....#.....#....#..#...#.#..##.','#####........#...#..#..##..#.#.','.#..#...#.##....#.#..#......###','#.###.#..#.....##..##....#...#.','.#...#.#####....##..........##.'
            ],
            'result' => 230
        ];
    }

    /**
     * @dataProvider provideTreeGridDataForDifferentTraversals
     */
    public function testFindsAmountOfTreesWithDifferentTraversals(array $treeGrid, int $expected): void
    {
        $actual = (new DayThree())->getProductOfDifferentTraversals($treeGrid);

        self::assertEquals($expected, $actual);
    }

    public function provideTreeGridDataForDifferentTraversals(): Generator
    {
        yield 'Tree Grid a' => [
            'treeGrid' => [
                '..##.........##.........##......',
                '#...#...#..#...#...#..#...#...#.',
                '.#....#..#..#....#..#..#....#..#',
                '..#.#...#.#..#.#...#.#..#.#...#.',
                '.#...##..#..#...##..#..#...##..#',
                '..#.##.......#.##.......#.##....',
                '.#.#.#....#.#.#.#....#.#.#.#....',
                '.#........#.#........#.#........',
                '#.##...#...#.##...#...#.##...#..',
                '#...##....##...##....##...##....',
                '.#..#...#.#.#..#...#.#.#..#...#.',
            ],
            'result' => 224
        ];

        yield 'Tree Grid b' => [
            'treeGrid' => [
                '...#...###......##.#..#.....##.','..#.#.#....#.##.#......#.#....#','......#.....#......#....#...##.','...#.....##.#..#........##.....','...##...##...#...#....###....#.','...##...##.......#....#...#.#..','..............##..#..#........#','#.#....#.........#...##.#.#.#.#','.#..##......#.#......#...#....#','#....#..#.#.....#..#...#...#...','#.#.#.....##.....#.........#...','......###..#....#..#..#.#....#.','##.####...#.............#.##..#','....#....#..#......#.......#...','...#.......#.#..#.........##.#.','......#.#.....###.###..###..#..','##..##.......#.#.....#..#....#.','..##.#..#....#.............##.#','....#.#.#..#..#........##....#.','.....####..#..#.###..#....##..#','#.#.......#...##.##.##..#....#.','.#..#..##...####.#......#..#...','#...##.......#...####......##..','...#.####....#.#...###.#.#...#.','....#...........#.##.##.#......','.....##...#.######.#..#....#..#','.#....#...##....#..######....#.','...#.....#...#####.##...#..#.#.','.....#...##........##.##.##.###','#.#..#....##....#......#....#.#','......##...#.........#....#.#..','###..#..##......##.#####.###.##','#.....#..##.##....#...........#','##..#.#..##..#.#.....#......#..','.#.##.#..#.#....##..#..#....#..','.#......##..##.#...#..#.......#','#....##.##..###..###......##.#.','....###..##.......#.###.#....#.','..##........#........##.....#..','.#..#.....#...####.##...##.....','....#.#.#.....#.##..##.....#..#','..............#.....#...#.....#','.#.....#......###...........#.#','.....#.#......#.##..#..........','.#......###............#.#.##..','.#.#....##.#..###.....#.##..#.#','.......#.#.#..#..#..#...##..#.#','.#.###...##.#.#.####.#.#...#...','...#.#....#......##.##.#.......','#...#.....##....#........##....','.....###...#.##.#......##.#..#.','..#...##.##.###..#..#......####','.#.##.#..#.##..##..........##..','..#.#.#..#.#.....#...###.....#.','..#..#.#....#.##.............##','.......#..###..#.#...#.....##.#','####.#.#......#..#.##.........#','..........#.....#..##......###.','..#..............#...#..##.....','......#.#.#..#.##.....####..##.','.##.#..#.#....#.......#..#.....','..#..#..#.##.#....###.#.#.#.#.#','.....#....#......###..#........','#.#.#..#...###.....#......#.##.','...#.#....#.#......#........#..','..#...###.#...#..#....##...#..#','.###.##..#..#...###.#..#.####..','#....#..##..##..#......#...##..','#.#..#...#..#...###..#.#.##....','##....#....##.####...#.#.###...','##.#...#.......#.##.##....#...#','..#.#..........#..#.#.#....#..#','..#........#...#....#....#....#','..#..#....#.......#........#...','......#....#....##.#....#.#.##.','.##...###.##.##....##.#...###..','.....##..#.#.....###..#.....###','....##.#.##...##..##........#..','#...#..##.#.#....#......#...#..','.###.##.#........#.####....#...','#.##.....#..#...#..##.##..#.#..','.....#.#..#....#..#...##.##.#..','.#......#####...##...#.#.###.#.','#......##....#.....#......##.#.','#.#.##.###.#......#####..#.....','........###.#...#..#.#........#','....#....###..#.##.#...#....#..','..........#..#.#....#...#.#...#','#.##......###.#.#.#....####...#','...#.#....#........##.#.....##.','.....##..#.#.#..###...##...#...','#...#...#....#....##........#..','.....#.........##.#......#..#..','#.....##..#.###.....#....##.##.','...#..#..#.#........##...##.#.#','..#..##.###.....#.#.....###.##.','..###.........#...##.....###...','...###...##.#...##....##.......','.#.#..#...###..#.#....#....#...','##..#.......#....#.#...#..#..#.','..#......#....####..##..#.###.#','..#.......##........#.#.#..#...','.#.......#.##.#.##.#.......#..#','###...#...#...#...#..#...#...##','..#..........#..###........##..','.##..#....##......##........#.#','......#.##......#......##...#.#','.#.#....#.#.#........#......#..','.#.#..#....####..##...##....#..','.#...##..#..#..#####....##.#...','.##.#.#...#...#.#...#.##.#...#.','###.#...##..#.###.#.....#.##.#.','#.....#.###.#.#...#..#....#.#..','..##..#....#......#.........###','.#...#...##......#...#.####....','..#.##...##..............#.#..#','..#......#..##...........#..#.#','..#####...#..#.......##...###..','..##..#....#.#...###.#...#.....','..#....#..#.#.......#..#.#.#...','.##..#.#.....##....#.......#...','...#.#..###...##....#....##..#.','.....##..#...##.####....##...#.','.......#.........#...#.##..####','........###..#..#.##.###..#....','.#.#..#.##.##.........#...#....','.###......#.....#....##....####','.##..##...........#.....#.....#','#.#.#.#.#.#.##..#.#.#..#.##....','.##.##...##..#....##..###..####','#..##.#......#...###.........#.','#..#...#..##..#..##.....##...#.','#...##..#...##.#.###.#...#.....','.###.....#.......#...#.##.###.#','..........#.#......#...###...##','..##....#.#..#....#.###...#..##','#.#..#....##.##..##.........##.','#.....#.##.###.#..#....##...#..','...#........##...#..###..######','#..#.#.#.#...#....#....###.#..#','...##.##.##.....##..#........#.','..#.#....#..#.......#...##.##.#','###.##.......##..#.####...#.#..','....#.#.....##.....#.#.##...#..','.#..##..#.....#.#..#...#..#..#.','.###....##...#......#.....#....','##.##.###......#...#...###.#...','#...#.##...#.#....##.....####..','#.#.#.#...###...##.............','..#....#.....##.#...#......#...','....#...#......#...#..#...#.#..','.###..#.....#..#...#....#...#..','..#...#.#..###.......#..#.#...#','#...###.##.....#....#..#.#..##.','...#.##.#.##......#.#.#.##.....','........####...##...##..#....#.','.#.#....#....#.#...##.###...##.','#.#...###.#.#.#....#....#.#....','.####.#..#.#....#..#.#..#..#...','#####...#...#...#....#.#.#..##.','..###.##.###...#..........#.##.','##.....#...#....###..###.#.#.#.','#..##.#..#..#..#...#.#...###..#','##....#.#...##......#.#...#...#','.##..........#.#....#...#.##..#','....#....####.#.####......#.###','..##.#.....####.#.####.......#.','#.##.##.#.....#.##......##...#.','......###..#.....#.....##......','..#..#....#.#...#.....#......##','##..#..#..###.#.#..#..##.....#.','#....#.#.....#####...#.#.......','.....#..#....#.#.#..#...#...#..','............#.##......##.##.#.#','....#...#.#........###....#....','..#..#...###.#....##..#..###.##','#.##....#...#.....##..#.##.#...','...##..###...#.#.....##.#......','.#..#.##.#####..#.......#..###.','...#.##...###.....####.#.#.....','.#......##.#.#.#.#.##.#.....#..','..#.##.#..##.......#.#.....##..','..................#....#...#...','.##.#..#.#.#..#.......#.#..##.#','....#........#......#..####..#.','#...#...##..##.#..#.......##...','#..#..#..#..#........####..#.#.','..#.#......#..#.##.##.#.#...#.#','...#..#......#.#.###.#.##..##..','..#...##.....#..#...##..#.#....','#.........#....#..#....##.##..#','..#..#.#....#..#...#.##.....#..','...#..#...#.#.....#..##..#.#...','....#........#.#....##..##..#..','#.....#.#..#.......#.##.....#..','.#.###.###...##...##..###...#..','.##.##.......#.#......#.....#.#','...#....##....#..#..........#.#','..#.##.........#.#.....#.....#.','...#.##..##.......##..##...#...','#.##......##.##..#.....##...##.','#.#.#..##...#.#............#.#.','....#.....#......##...#.#.....#','...#.#......#.#...###.......#..','......##..###....#.#...#.#####.','..#..#.#.#...##.#...###..##..#.','##.##.#.#.##.#..#....#...#...#.','#..#....######.##.#...#...#.#..','.#..#.##....#..#.#.......#....#','....#....#......##....##.#.#...','.###......#..#..#.......####..#','.#.#.....#..###...........##...','.##..##.##.....####..#..#..##..','..#..##.#......#...###.##..#.#.','....##..#.....###..#.##....##.#','#..#......#....#.........#.....','.#...#.....#.#..#..##....#.....','.##..#...#..##.#..#...........#','..#..##........##.......#..#...','#.....#....#....#.#.#...##.#...','...#...#.#.#..#.##.#.#...#.....','..#..#.#....#....###....#.#.#..','...###..#...#..#....#.....#....','...#...#.#..#.....#...###......','##......#..........#.#.#..#.#.#','....#.....#.....#..#..#.#.#.#..','...####...#.##...#.#..#....#.#.','#.##........##.............#.##','#.#.#.#.#.....................#','.#.###....#..##.##.##....#.....','#.#...#.####.###...#..#..#.#...','.##...#..###.......##..#.#.....','#.#.#.#...#...#.##.....#.......','.##.#.#.#......####..#.#.......','###..........#......#...##...#.','.........##...#.##...#.#.......','...#.#.....#...#..#...#..##..#.','.#..###...#.#.........###....#.','##..#...#........#.........##..','.....#...#.#...#.#.#...........','..#....##...#.#..#..#.##....##.','.##....#.#.....##.#..#..#...##.','..##......#.#...#.#.......##.#.','##...#..#...##.#........#.##...','#......#.##..#.#..#.###.......#','#.#...#.....#.#......#.#.#.....','#.....#..#.......#....##.#.#..#','###.#....#..##.#.##....#....#..','#.##.##....#.#..#.#...#....#...','####...#####...#.....#....##.#.','....#.#...#.#.##.#.#.##.#.#.###','#.....##.#.....#.#......#.#..#.','.#....##.#..#........#...##.#..','......#...#....##....##....##..','..###.....#....##.#...#..#.....','#....##...##.##..##.#...#...#..','#..#...#...#.#....##..#.#....#.','......................#.....#..','.#..#...#.........#....##...###','.##.#.#...##...#...#...#..#....','.#.###....#.#............##..#.','###..##.#.#.#.#....##...#......','.##................####...##.##','.#.#.........##....#.#.##.##.#.','....#...#...#...##...#.##.#..#.','.#.#........#..##.....#..#....#','##.#..#.#....#.....#...#...#...','.#...##....#.....##....#..#.#.#','####.....#..#....#......###.##.','##..##.#....###.....#...#......','.##.#...#.....#.#..#.#..#.#...#','.....#.#..#..#..###.#...###.#..','.#.#.##.#..#.#..#...#..#.......','..#.....#....#.##.##.##.......#','.#..##....###...#..............','#....#...#.#.......#....##.#...','....#.#..##.#....#..#.#....#.#.','#.........##...#.#.............','#.#.......##.....#...##..##.#.#','.......#....#..##...#..#######.','.#.#...##........#..#.....#.#..','.#.......#..#......#.##.##...##','.........#............#....#..#','.#......#...##...##...#....###.','.........#...#.#.###.......#...','###.#..#.#.#.#......##...#.#...','.#.........##.#....###....#.#..','#.#....#..#.##.#..#....##...#..','###.#...#..#..##........#.###..','.....#....#..#........#..#.##.#','..#.....##......#....#..#.#.#..','.#.........#.....#.....#.......','......#....#.###..#.#....#....#','..#.#..#.#.###.........#..#..#.','..#..#.#.#.........#....##.#.#.','#.......#........##...##....#..','##..#..#...###...#..##..#..#.#.','##..#..#....#.#..##..#..#.#..#.','..##.....##.#..#.#........###..','..#.#..#..##........#...#....##','.##..#....##..#..#..#..#.#....#','#....#.....##........#.....#.##','......#....#.#..#......#.##....','.......#..#..#......##.........','......#...#..##.....#......#..#','#..#..#....##....#........##..#','##....#...#.#.....#####........','...#.#..#.#.##.#.##..##...#....','..#..#..#..#..#....#..#..##...#','.#.....#....##.##....##.....#..','#...#.....#.....#.#...#.#....#.','.###...#..##....#..#...#.###...','....#..##..#.......#.##.##..###','#.......##.....#.......#.#...##','#.....#.#.#....#.#......#.#.#..','..##.....#..###......##........','.....#...#..##....#......#.....','#..#..#....#.#...#..###.......#','.....#.....#....#..#...#.#..##.','#####........#...#..#..##..#.#.','.#..#...#.##....#.#..#......###','#.###.#..#.....##..##....#...#.','.#...#.#####....##..........##.'
            ],
            'result' => 9533698720
        ];
    }
}